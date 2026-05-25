<?php
/**
 * PHP Pagination Class
 * @author admin@catchmyfame.com - http://www.catchmyfame.com
 * @version 3.0.0
 * @date February 6, 2014
 * @copyright (c) admin@catchmyfame.com (www.catchmyfame.com)
 * @license CC Attribution-ShareAlike 3.0 Unported (CC BY-SA 3.0) - http://creativecommons.org/licenses/by-sa/3.0/
 */
error_reporting(-1);

class Paginator
{
    public $current_page;
    public $default_ipp;
    public $end_range;
    public $items_per_page;
    public $limit_end;
    public $limit_start;
    public $num_pages;
    public $range;
    public $start_range;
    public $total_items;
    protected $ipp_array;
    protected $limit;
    protected $mid_range;
    protected $query_params;
    protected $querystring;
    protected $return;
    protected $get_ipp;

    public function __construct($total = 0, $mid_range = 7, $ipp_array = [10, 25, 50, 100, "All"])
    {
        $this->total_items = (int)$total;
        $this->return = "";
        $this->query_params = [];
        $this->querystring = "";
        $this->range = [];
        if ($this->total_items <= 0) {
            $this->total_items = 0;
            $this->num_pages = 0;
            $this->current_page = 1;
            $this->items_per_page = 0;
            $this->limit_start = 0;
            $this->limit_end = 0;
            $this->ipp_array = is_array($ipp_array) ? $ipp_array : [10, 25, 50, 100, "All"];
            $this->default_ipp = $this->ipp_array[0];
            return;
        }
        $this->mid_range = (int)$mid_range; // midrange must be an odd int >= 1
        if ($this->mid_range % 2 == 0 Or $this->mid_range < 1) {
            $this->mid_range = 7;
        }
        if (!is_array($ipp_array)) {
            $ipp_array = [10, 25, 50, 100, "All"];
        }
        $this->ipp_array = $ipp_array;
        $this->default_ipp = $this->ipp_array[0];
        $this->items_per_page = $this->requested_items_per_page();
        if ($this->items_per_page == "All") {
            $this->num_pages = 1;
        } else {
            if (!is_numeric($this->items_per_page) OR $this->items_per_page <= 0) $this->items_per_page = $this->ipp_array[0];
            $this->num_pages = ceil($this->total_items / $this->items_per_page);
        }
        $this->current_page = !empty($_GET["page"]) ? max(1, (int)$_GET["page"]) : 1; // must be numeric > 0
        $this->query_params = $this->request_query_params();
        $this->querystring = empty($this->query_params) ? "" : "&amp;" . h(http_build_query($this->query_params));
        $base_url = h($_SERVER['PHP_SELF'] ?? '');
        $safe_items_per_page = h((string)$this->items_per_page);
        if ($this->num_pages > 10) {
            $this->return = ($this->current_page > 1 And $this->total_items >= 10) ? "<a class=\"paginate ajax-pagination previous\" href=\"{$base_url}?page=" . ($this->current_page - 1) . "&amp;ipp={$safe_items_per_page}{$this->querystring}\">Previous</a> " : "<span class=\"inactive ajax-pagination previous\" href=\"#\">Previous</span> ";
            $this->start_range = $this->current_page - floor($this->mid_range / 2);
            $this->end_range = $this->current_page + floor($this->mid_range / 2);
            if ($this->start_range <= 0) {
                $this->end_range += abs($this->start_range) + 1;
                $this->start_range = 1;
            }
            if ($this->end_range > $this->num_pages) {
                $this->start_range -= $this->end_range - $this->num_pages;
                $this->end_range = $this->num_pages;
            }
            $this->range = range($this->start_range, $this->end_range);
            for ($i = 1; $i <= $this->num_pages; $i++) {
                if ($this->range[0] > 2 And $i == $this->range[0]) $this->return .= " ... ";
                // loop through all pages. if first, last, or in range, display
                if ($i == 1 Or $i == $this->num_pages Or in_array($i, $this->range)) $this->return .= ($i == $this->current_page And $this->items_per_page != "All") ? "<a title=\"Go to page $i of $this->num_pages\" class=\"current\" href=\"#\">$i</a> \n" : "<a class=\"paginate\" title=\"Go to page $i of $this->num_pages\" href=\"{$base_url}?page=$i&amp;ipp={$safe_items_per_page}{$this->querystring}\">$i</a> \n";
                if ($this->range[$this->mid_range - 1] < $this->num_pages - 1 And $i == $this->range[$this->mid_range - 1]) $this->return .= " ... ";
            }
            $this->return .= (($this->current_page < $this->num_pages And $this->total_items >= 10) And ($this->items_per_page != "All") And $this->current_page > 0) ? "<a class=\"paginate ajax-pagination next\" href=\"{$base_url}?page=" . ($this->current_page + 1) . "&amp;ipp={$safe_items_per_page}{$this->querystring}\">Next</a>\n" : "<span class=\"inactive ajax-pagination next\" href=\"#\">Next</span>\n";
            $this->return .= ($this->items_per_page == "All") ? "<a class=\"current\" style=\"margin-left:10px\" href=\"#\">All</a> \n" : "<a class=\"paginate ajax-pagination\" style=\"margin-left:10px\" href=\"{$base_url}?page=1&amp;ipp=All{$this->querystring}\">All</a> \n";
        } else {
            for ($i = 1; $i <= $this->num_pages; $i++) {
                $this->return .= ($i == $this->current_page) ? "<a class=\"current\" href=\"#\">$i</a> " : "<a class=\"paginate ajax-pagination\" href=\"{$base_url}?page=$i&amp;ipp={$safe_items_per_page}{$this->querystring}\">$i</a> ";
            }
            $this->return .= "<a class=\"paginate ajax-pagination\" href=\"{$base_url}?page=1&amp;ipp=All{$this->querystring}\">All</a> \n";
        }
        if ($this->items_per_page == "All") {
            $this->items_per_page = (int)$this->total_items;
        }
        $this->limit_start = ($this->current_page <= 0) ? 0 : ($this->current_page - 1) * $this->items_per_page;
        if ($this->current_page <= 0) $this->items_per_page = 0;
        $this->limit_end = ($this->items_per_page == "All") ? (int)$this->total_items : (int)$this->items_per_page;
    }

    public function display_items_per_page()
    {
        $items = NULL;
        natsort($this->ipp_array); // This sorts the drop down menu options array in numeric order (with 'all' last after the default value is picked up from the first slot
        foreach ($this->ipp_array as $ipp_opt) {
            $safe_ipp = h((string)$ipp_opt);
            $items .= ($ipp_opt == $this->items_per_page) ? "<option selected value=\"{$safe_ipp}\">{$safe_ipp}</option>\n" : "<option value=\"{$safe_ipp}\">{$safe_ipp}</option>\n";
        }
        $base_url = h($_SERVER['PHP_SELF'] ?? '');
        return "<span class=\"paginate ajax-pagination\">Items per page:</span><select class=\"paginate ajax-pagination\" onchange=\"window.location='{$base_url}?page=1&amp;ipp='+this[this.selectedIndex].value+'{$this->querystring}';return false\">$items</select>\n";
    }

    public function display_jump_menu()
    {
        $option = NULL;
        for ($i = 1; $i <= $this->num_pages; $i++) {
            $option .= ($i == $this->current_page) ? "<option value=\"$i\" selected>$i</option>\n" : "<option value=\"$i\">$i</option>\n";
        }
        $base_url = h($_SERVER['PHP_SELF'] ?? '');
        $safe_items_per_page = h((string)$this->items_per_page);
        return "<span class=\"paginate\">Page:</span><select class=\"paginate ajax-pagination\" onchange=\"window.location='{$base_url}?page='+this[this.selectedIndex].value+'&amp;ipp={$safe_items_per_page}{$this->querystring}';return false\">$option</select>\n";
    }

    public function display_pages()
    {
        return $this->return;
    }

    private function requested_items_per_page()
    {
        $requested = $_GET["ipp"] ?? $this->default_ipp;
        if (is_array($requested)) {
            return $this->default_ipp;
        }

        if ($requested === "All") {
            return "All";
        }

        $requested = (int)$requested;
        if ($requested <= 0) {
            return $this->default_ipp;
        }

        $allowed = array_filter($this->ipp_array, 'is_numeric');
        return in_array($requested, array_map('intval', $allowed), true) ? $requested : $this->default_ipp;
    }

    private function request_query_params()
    {
        $params = [];
        foreach (array_merge($_GET, $_POST) as $key => $val) {
            if ($key === "page" || $key === "ipp" || is_array($val)) {
                continue;
            }

            $params[$key] = (string)$val;
        }

        return $params;
    }
}

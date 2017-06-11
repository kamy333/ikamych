<?php
/* 
V5.18 3 Sep 2012  (c) 2000-2012 John Lim (jlim#natsoft.com). All rights reserved.
  Released under both BSD license and Lesser GPL library license. 
  Whenever there is any discrepancy between the two licenses, 
  the BSD license will take precedence. See License.txt. 
  Set tabs to 4 for best viewing.
  
  Latest version is available at http://adodb.sourceforge.net
  
  Library for basic performance monitoring and tuning 
  
*/

// security - hide paths
if (!defined('ADODB_DIR')) die();

//
// Thx to  Fernando Ortiz, mailto:fortiz#lacorona.com.mx
// With info taken from http://www.oninit.com/oninit/sysmaster/index.html
//
class perf_informix extends adodb_perf
{

    // Maximum size on varchar upto 9.30 255 chars
    // better truncate varchar to 255 than char(4000) ?
    var $createTableSQL = "CREATE TABLE adodb_logsql (
		created DATETIME YEAR TO SECOND NOT NULL,
		sql0 VARCHAR(250) NOT NULL,
		sql1 VARCHAR(255) NOT NULL,
		params VARCHAR(255) NOT NULL,
		tracer VARCHAR(255) NOT NULL,
		timer DECIMAL(16,6) NOT NULL
	)";

    var $tablesSQL = "SELECT a.tabname tablename, ti_nptotal*2 size_in_k, ti_nextns extents, ti_nrows records FROM systables c, sysmaster:systabnames a, sysmaster:systabinfo b WHERE c.tabname NOT matches 'sys*' AND c.partnum = a.partnum AND c.partnum = b.ti_partnum";

    var $settings = array(
        'Ratios',
        'data cache hit ratio' => array('RATIOH',
            "SELECT round((1-(wt.value / (rd.value + wr.value)))*100,2)
		FROM sysmaster:sysprofile wr, sysmaster:sysprofile rd, sysmaster:sysprofile wt
		WHERE rd.name = 'pagreads' AND
		wr.name = 'pagwrites' AND
		wt.name = 'buffwts'",
            '=WarnCacheRatio'),
        'IO',
        'data reads' => array('IO',
            "SELECT value FROM sysmaster:sysprofile WHERE NAME='pagreads'",
            'Page reads'),

        'data writes' => array('IO',
            "SELECT value FROM sysmaster:sysprofile WHERE NAME='pagwrites'",
            'Page writes'),

        'Connections',
        'current connections' => array('SESS',
            'SELECT count(*) FROM sysmaster:syssessions',
            'Number of sessions'),

        false

    );

    function perf_informix(&$conn)
    {
        $this->conn = $conn;
    }

}

?>

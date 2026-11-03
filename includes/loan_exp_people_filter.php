<?php
$picker_ids = $people_selection['mode'] === 'all' ? [] : $people_selection['ids'];
?>
<div class="form-group loan-exp-filter--person">
    <div class="loan-exp-filter-heading">
        <label for="loan-person">People</label>
        <button class="loan-exp-manage-people-trigger" type="button"
                data-toggle="modal" data-target="#loanExpensePeopleModal"
                data-loan-exp-target="#loanExpensePeopleModal"
                onclick="return window.loanExpOpenModalFallback ? window.loanExpOpenModalFallback('#loanExpensePeopleModal') : true;">
            <i class="fa fa-users" aria-hidden="true"></i> Manage
        </button>
    </div>
    <select id="loan-person" class="form-control" name="person_id" aria-describedby="loan-people-help">
        <option value="all"<?php echo $people_selection['mode'] === 'all' ? ' selected' : ''; ?>>All people</option>
        <option value="selected"<?php echo $people_selection['mode'] === 'selected' ? ' selected' : ''; ?>>Choose several people<?php echo $people_selection['mode'] === 'selected' ? ' (' . count($picker_ids) . ')' : ''; ?></option>
        <?php foreach ($person_balance_rows as $person_balance_row) {
            if ((int) $person_balance_row['close_person'] !== 0) {
                continue;
            }
            $person_balance = (float) $person_balance_row['balance_chf'];
            if ($zero_balance_mode === 'exclude' && round($person_balance, 2) == 0.0) {
                continue;
            }
            $selected = $people_selection['mode'] === 'single' && (int) $person_balance_row['id'] === (int) $p_id ? ' selected' : '';
            $label = $person_balance_row['person_name'] . ' — CHF ' . number_format($person_balance, 2);
            echo '<option' . $selected . ' value="' . h($person_balance_row['id']) . '">' . h($label) . '</option>';
        } ?>
    </select>
    <p class="sr-only" id="loan-people-help"<?php echo $people_selection['mode'] === 'single' ? ' hidden' : ''; ?>>All people and combinations include accounts hidden from the single-person list.</p>
    <details class="loan-people-picker" id="loan-people-picker"<?php echo $people_selection['mode'] === 'selected' ? '' : ' hidden'; ?><?php echo $people_selection['invalid'] ? ' open' : ''; ?>>
        <summary>Choose people <span id="loan-people-count"><?php echo count($picker_ids); ?></span></summary>
        <div class="loan-people-picker__panel">
            <p class="loan-people-help">You can also select accounts hidden from the single-person list.</p>
            <div class="loan-people-picker__actions">
                <button type="button" data-loan-people-check="all">Select all</button>
                <button type="button" data-loan-people-check="none">Clear selection</button>
            </div>
            <fieldset class="loan-people-picker__list" aria-describedby="loan-people-error">
                <legend class="sr-only">People to combine</legend>
                <?php foreach ($person_balance_rows as $person_balance_row) { ?>
                    <label class="loan-people-picker__option">
                        <input type="checkbox" name="person_ids[]" value="<?php echo h($person_balance_row['id']); ?>"<?php echo in_array((int) $person_balance_row['id'], $picker_ids, true) ? ' checked' : ''; ?><?php echo $people_selection['mode'] === 'selected' ? '' : ' disabled'; ?>>
                        <span><?php echo h($person_balance_row['person_name']); ?><?php if ((int) $person_balance_row['close_person'] !== 0) { ?><small>Hidden from list</small><?php } ?></span>
                        <span class="loan-people-picker__balance">CHF <?php echo h(number_format((float) $person_balance_row['balance_chf'], 2)); ?></span>
                    </label>
                <?php } ?>
            </fieldset>
            <p class="loan-people-picker__error" id="loan-people-error" role="alert"<?php echo $people_selection['invalid'] ? '' : ' hidden'; ?>>Select at least one person.</p>
            <div class="loan-people-picker__footer">
                <button class="btn btn-default" id="loan-people-cancel" type="button">Cancel</button>
                <button class="btn btn-primary" type="submit">Apply selection</button>
            </div>
        </div>
    </details>
</div>

<?php
$loan_exp_form_prefix = $loan_exp_form_prefix ?? "";
$loan_exp_form_values = $loan_exp_form_values ?? [];

$loan_exp_amount = $loan_exp_form_values["amount"] ?? "";
$loan_exp_cash = (string) ($loan_exp_form_values["cash"] ?? "0");
$loan_exp_ccy_id = $loan_exp_form_values["ccy_id"] ?? "1";
$loan_exp_rate = $loan_exp_form_values["rate"] ?? "1";
$loan_exp_person_id = $loan_exp_form_values["person_id"] ?? $p_id;
$loan_exp_type_id = $loan_exp_form_values["expense_type_id"] ?? "";
$loan_exp_date = $loan_exp_form_values["expense_date"] ?? date('Y-m-d');
$loan_exp_comment = $loan_exp_form_values["comment"] ?? "";
$loan_exp_document = $loan_exp_form_values["document"] ?? "";
?>

<div class="loan-exp-modal__row loan-exp-modal__row--three">
    <div class="loan-exp-modal__cell">
        <div class="form-group">
            <label class="control-label" for="<?php echo h($loan_exp_form_prefix); ?>amount">Amount<span class="loan-exp-required-star" aria-hidden="true">*</span></label>
            <input id="<?php echo h($loan_exp_form_prefix); ?>amount" class="form-control" type="number" step="0.01" name="amount" value="<?php echo h($loan_exp_amount); ?>" required>
        </div>
    </div>
    <div class="loan-exp-modal__cell">
        <div class="form-group">
            <label class="control-label" for="<?php echo h($loan_exp_form_prefix); ?>ccy-id">Currency<span class="loan-exp-required-star" aria-hidden="true">*</span></label>
            <select id="<?php echo h($loan_exp_form_prefix); ?>ccy-id" class="form-control" name="ccy_id" required>
                <?php echo loan_exp_select_options($currencies, "id", "currency", $loan_exp_ccy_id); ?>
            </select>
        </div>
    </div>
    <div class="loan-exp-modal__cell">
        <div class="form-group">
            <label class="control-label" for="<?php echo h($loan_exp_form_prefix); ?>rate">Rate<span class="loan-exp-required-star" aria-hidden="true">*</span></label>
            <input id="<?php echo h($loan_exp_form_prefix); ?>rate" class="form-control" type="number" step="0.00001" min="0.00001" name="rate" value="<?php echo h($loan_exp_rate); ?>" required>
        </div>
    </div>
</div>

<div class="loan-exp-modal__row loan-exp-modal__row--three">
    <div class="loan-exp-modal__cell">
        <div class="form-group">
            <label class="control-label" for="<?php echo h($loan_exp_form_prefix); ?>expense-date">Expense date<span class="loan-exp-required-star" aria-hidden="true">*</span></label>
            <input id="<?php echo h($loan_exp_form_prefix); ?>expense-date" class="form-control" type="date" name="expense_date" value="<?php echo h($loan_exp_date); ?>" required>
        </div>
    </div>
    <div class="loan-exp-modal__cell">
        <div class="form-group">
            <label class="control-label" for="<?php echo h($loan_exp_form_prefix); ?>person-id">Person<span class="loan-exp-required-star" aria-hidden="true">*</span></label>
            <select id="<?php echo h($loan_exp_form_prefix); ?>person-id" class="form-control" name="person_id" required>
                <?php echo loan_exp_select_options($expense_people, "id", "person_name", $loan_exp_person_id); ?>
            </select>
        </div>
    </div>
    <div class="loan-exp-modal__cell">
        <div class="form-group">
            <label class="control-label" for="<?php echo h($loan_exp_form_prefix); ?>expense-type-id">Expense type<span class="loan-exp-required-star" aria-hidden="true">*</span></label>
            <select id="<?php echo h($loan_exp_form_prefix); ?>expense-type-id" class="form-control" name="expense_type_id" required>
                <?php echo loan_exp_select_options($expense_types, "id", "expense_type", $loan_exp_type_id); ?>
            </select>
        </div>
    </div>
</div>

<div class="form-group">
    <span class="control-label">Cash<span class="loan-exp-required-star" aria-hidden="true">*</span></span>
    <div class="loan-exp-choice-group" role="radiogroup" aria-label="Cash">
        <label class="loan-exp-choice" for="<?php echo h($loan_exp_form_prefix); ?>cash-no">
            <input id="<?php echo h($loan_exp_form_prefix); ?>cash-no" type="radio" name="cash" value="0"<?php echo $loan_exp_cash === "1" ? "" : " checked"; ?>>
            <span>No</span>
        </label>
        <label class="loan-exp-choice" for="<?php echo h($loan_exp_form_prefix); ?>cash-yes">
            <input id="<?php echo h($loan_exp_form_prefix); ?>cash-yes" type="radio" name="cash" value="1"<?php echo $loan_exp_cash === "1" ? " checked" : ""; ?>>
            <span>Yes</span>
        </label>
    </div>
</div>

<div class="form-group">
    <label class="control-label" for="<?php echo h($loan_exp_form_prefix); ?>comment">Comment</label>
    <textarea id="<?php echo h($loan_exp_form_prefix); ?>comment" class="form-control" name="comment" rows="3"><?php echo h($loan_exp_comment); ?></textarea>
</div>

<div class="form-group">
    <label class="control-label" for="<?php echo h($loan_exp_form_prefix); ?>document">Document</label>
    <input id="<?php echo h($loan_exp_form_prefix); ?>document" class="form-control" type="text" name="document" value="<?php echo h($loan_exp_document); ?>" placeholder="Document path or reference">
</div>

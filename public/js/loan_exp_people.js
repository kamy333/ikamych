document.addEventListener('DOMContentLoaded', function () {
    var select = document.getElementById('loan-person');
    if (!select) return;
    var form = select.form;
    var picker = document.getElementById('loan-people-picker');
    var help = document.getElementById('loan-people-help');
    var error = document.getElementById('loan-people-error');
    var count = document.getElementById('loan-people-count');
    var checkboxes = Array.prototype.slice.call(picker.querySelectorAll('input[type="checkbox"]'));
    var appliedValue = select.value;
    var appliedChecks = checkboxes.map(function (checkbox) { return checkbox.checked; });

    function checkedCount() {
        return checkboxes.filter(function (checkbox) { return checkbox.checked; }).length;
    }
    function refresh() {
        count.textContent = checkedCount();
        error.hidden = true;
        picker.classList.remove('has-error');
    }
    function valid() {
        if (select.value !== 'selected' || checkedCount() > 0) return true;
        picker.hidden = false;
        picker.open = true;
        error.hidden = false;
        picker.classList.add('has-error');
        picker.querySelector('summary').focus();
        return false;
    }
    function cancelSelection() {
        select.value = appliedValue;
        picker.open = false;
        picker.hidden = appliedValue !== 'selected';
        help.hidden = appliedValue !== 'selected' && appliedValue !== 'all';
        checkboxes.forEach(function (checkbox, index) {
            checkbox.checked = appliedChecks[index];
            checkbox.disabled = appliedValue !== 'selected';
        });
        refresh();
        select.focus();
    }
    document.getElementById('loan-people-cancel').addEventListener('click', cancelSelection);
    picker.addEventListener('keydown', function (event) {
        if (event.key === 'Escape' && picker.open) {
            event.preventDefault();
            cancelSelection();
        }
    });
    select.addEventListener('change', function () {
        var multiple = select.value === 'selected';
        picker.hidden = !multiple;
        picker.open = multiple;
        help.hidden = !multiple && select.value !== 'all';
        checkboxes.forEach(function (checkbox) { checkbox.disabled = !multiple; });
        refresh();
        if (!multiple) form.requestSubmit();
    });
    checkboxes.forEach(function (checkbox) { checkbox.addEventListener('change', refresh); });
    picker.querySelectorAll('[data-loan-people-check]').forEach(function (button) {
        button.addEventListener('click', function () {
            checkboxes.forEach(function (checkbox) { checkbox.checked = button.dataset.loanPeopleCheck === 'all'; });
            refresh();
        });
    });
    form.addEventListener('submit', function (event) {
        if (!valid()) {
            event.preventDefault();
            event.stopImmediatePropagation();
        }
    }, true);
});

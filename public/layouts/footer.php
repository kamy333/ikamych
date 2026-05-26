<?php echo str_repeat("<br>", 4); ?>
<footer class="row nav navbar-fixed-bottom my_footer">
    <div class="row">
        <div class="socialmediaicons pull-right" style="margin-right: 5em;">

        </div>
        <div class="text-center">
            <p class="text-center">
                <small>&#xA9;&nbsp;2014 - <?php echo date("Y"); ?>,<?php echo " " . $logo; ?> </small>
            </p>
        </div>
    </div>
</footer>

</div>   <!--Div class container-->


<script src="<?php echo $Nav->path_public; ?>js/jquery-2.1.1.js"></script>
<script src="<?php echo $Nav->path_public; ?>js/plugins/select2/select2.full.min.js"></script>


<!--<script src="https://cdn.tiny.cloud/1/bd42pftj1phl7lgv2274y7i6ok8af0vdegi2yherw7rr3jux/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>-->
<!--<script>tinymce.init({selector: 'textarea'});</script>-->

<script src="<?php echo $Nav->path_public; ?>js/bootstrap.min.js"></script>
<script src="<?php echo $Nav->path_public; ?>js/flatpickr/flatpickr.min.js"></script>
<script src="<?php echo $Nav->path_public; ?>myjs/socialmedia.js"></script>

<script>
    (function() {
        var initIkamyFooter = function() {
        if (window.ikamyFooterReady) {
            return;
        }

        window.ikamyFooterReady = true;
        var $ = window.jQuery;

        if ($ && $.fn.select2) {
            $('.select2-dropdown-special').select2({
                tags: false
            });
        }

        if (window.flatpickr) {
            flatpickr('.js-flatpickr-date', {
                altInput: true,
                altFormat: 'd.m.Y',
                dateFormat: 'Y-m-d',
                allowInput: true
            });

            flatpickr('.js-flatpickr-time', {
                enableTime: true,
                noCalendar: true,
                dateFormat: 'H:i',
                time_24hr: true,
                minuteIncrement: 5,
                allowInput: true
            });
        }

        var setInputValue = function(form, selector, value) {
            var input = form.querySelector(selector);

            if (!input) {
                return;
            }

            if (input._flatpickr) {
                if (value) {
                    input._flatpickr.setDate(value, true);
                } else {
                    input._flatpickr.clear();
                }
            } else {
                input.value = value;
            }
        };

        var setRadioValue = function(form, name, value) {
            form.querySelectorAll('input[name="' + name + '"]').forEach(function(input) {
                input.checked = input.value === String(value);
            });
        };

        var setCalendarModalMode = function(modal, triggerElement) {
            var form = modal.querySelector('form.ikamy-create-modal__form');

            if (!form) {
                return;
            }

            var isEdit = triggerElement.getAttribute('data-ikamy-calendar-edit') === '1';
            var getCalendarData = function(name) {
                return triggerElement.getAttribute('data-calendar-' + name) || '';
            };
            var title = modal.querySelector('#ikamy-calendar-modal-title');
            var submit = modal.querySelector('.ikamy-create-modal__submit');
            var idInput = form.querySelector('input[name="id"]');

            if (isEdit) {
                var appointmentId = getCalendarData('id');
                form.action = (form.getAttribute('data-edit-action') || '').replace('__ID__', encodeURIComponent(appointmentId));
                if (idInput) {
                    idInput.value = appointmentId;
                }
                if (title) {
                    title.textContent = 'Edit calendar date';
                }
                if (submit) {
                    submit.innerHTML = '<i class="fa fa-save" aria-hidden="true"></i> Save date';
                }

                setRadioValue(form, 'person', getCalendarData('person'));
                setInputValue(form, 'input[name="title"]', getCalendarData('title'));
                setInputValue(form, 'input[name="start_date"]', getCalendarData('start-date'));
                setInputValue(form, 'input[name="start_time"]', getCalendarData('start-time'));
                setInputValue(form, 'input[name="end_time"]', getCalendarData('end-time'));
                setInputValue(form, 'textarea[name="comment"]', getCalendarData('comment'));
                setRadioValue(form, 'is_birthday', getCalendarData('birthday'));
            } else {
                form.action = form.getAttribute('data-create-action') || form.action;
                if (idInput) {
                    idInput.value = '';
                }
                if (title) {
                    title.textContent = 'New calendar date';
                }
                if (submit) {
                    submit.innerHTML = '<i class="fa fa-calendar-plus-o" aria-hidden="true"></i> Create date';
                }

                setRadioValue(form, 'person', '0');
                setInputValue(form, 'input[name="title"]', '');
                setInputValue(form, 'input[name="start_date"]', '<?php echo h(date('Y-m-d')); ?>');
                setInputValue(form, 'input[name="start_time"]', '');
                setInputValue(form, 'input[name="end_time"]', '');
                setInputValue(form, 'textarea[name="comment"]', '');
                setRadioValue(form, 'is_birthday', '0');
            }
        };

        var setNoteModalMode = function(modal, triggerElement) {
            var form = modal.querySelector('form.ikamy-create-modal__form');

            if (!form) {
                return;
            }

            var isEdit = triggerElement.getAttribute('data-ikamy-note-edit') === '1';
            var getNoteData = function(name) {
                return triggerElement.getAttribute('data-note-' + name) || '';
            };
            var title = modal.querySelector('#ikamy-note-modal-title');
            var submit = modal.querySelector('.ikamy-create-modal__submit');
            var idInput = form.querySelector('input[name="id"]');

            if (isEdit) {
                var noteId = getNoteData('id');
                form.action = (form.getAttribute('data-edit-action') || '').replace('__ID__', encodeURIComponent(noteId));
                if (idInput) {
                    idInput.value = noteId;
                }
                if (title) {
                    title.textContent = 'Edit note';
                }
                if (submit) {
                    submit.innerHTML = '<i class="fa fa-save" aria-hidden="true"></i> Save note';
                }

                setInputValue(form, 'input[name="user_id"]', getNoteData('user-id'));
                setInputValue(form, 'textarea[name="note"]', getNoteData('text'));
                setInputValue(form, 'input[name="due_date"]', getNoteData('due-date'));
                setInputValue(form, 'input[name="rank"]', getNoteData('rank'));
                setRadioValue(form, 'done', getNoteData('done'));
                setInputValue(form, 'input[name="progress"]', getNoteData('progress') || '5');
                setInputValue(form, 'input[name="web_address"]', getNoteData('web-address'));
                setInputValue(form, 'textarea[name="comment"]', getNoteData('comment'));
            } else {
                form.action = form.getAttribute('data-create-action') || form.action;
                if (idInput) {
                    idInput.value = '';
                }
                if (title) {
                    title.textContent = 'New note';
                }
                if (submit) {
                    submit.innerHTML = '<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Create note';
                }

                setInputValue(form, 'input[name="user_id"]', '<?php echo h($_SESSION['user_id'] ?? ''); ?>');
                setInputValue(form, 'textarea[name="note"]', '');
                setInputValue(form, 'input[name="due_date"]', '<?php echo h(date('Y-m-d')); ?>');
                setInputValue(form, 'input[name="rank"]', '1');
                setRadioValue(form, 'done', '0');
                setInputValue(form, 'input[name="progress"]', '5');
                setInputValue(form, 'input[name="web_address"]', '');
                setInputValue(form, 'textarea[name="comment"]', '');
            }
        };

        var showModal = function(modal) {
            if ($ && $.fn.modal) {
                $(modal).modal('show');
                return;
            }

            modal.style.display = 'block';
            modal.removeAttribute('aria-hidden');
            modal.setAttribute('aria-modal', 'true');
            modal.classList.add('in');
            document.body.classList.add('modal-open');

            if (!document.querySelector('.modal-backdrop[data-ikamy-fallback="1"]')) {
                var backdrop = document.createElement('div');
                backdrop.className = 'modal-backdrop fade in';
                backdrop.setAttribute('data-ikamy-fallback', '1');
                document.body.appendChild(backdrop);
            }
        };

        var hideModal = function(modal) {
            if ($ && $.fn.modal) {
                $(modal).modal('hide');
                return;
            }

            modal.style.display = 'none';
            modal.setAttribute('aria-hidden', 'true');
            modal.removeAttribute('aria-modal');
            modal.classList.remove('in');
            document.body.classList.remove('modal-open');
            document.querySelectorAll('.modal-backdrop[data-ikamy-fallback="1"]').forEach(function(backdrop) {
                backdrop.parentNode.removeChild(backdrop);
            });
        };

        var toggleNoteDetails = function(detailsToggle) {
            var detailsId = detailsToggle.getAttribute('aria-controls');
            var detailsPanel = detailsId ? document.getElementById(detailsId) : null;
            var isExpanded = detailsToggle.getAttribute('aria-expanded') === 'true';

            if (!detailsPanel) {
                return;
            }

            detailsPanel.hidden = isExpanded;
            detailsToggle.setAttribute('aria-expanded', isExpanded ? 'false' : 'true');
            detailsToggle.title = isExpanded ? 'Show note details' : 'Hide note details';
            detailsToggle.querySelectorAll('.sr-only').forEach(function(label) {
                label.textContent = isExpanded ? 'Show note details' : 'Hide note details';
            });
        };

        document.addEventListener('click', function(event) {
            var detailsToggle = event.target.closest('.small-note-details-toggle');

            if (detailsToggle) {
                event.preventDefault();
                toggleNoteDetails(detailsToggle);

                return;
            }

            var noteLine = event.target.closest('.small-note-line');

            if (noteLine && !event.target.closest('.small-note-edit-link, .small-note-delete-link, .smallNoteChecklink, .small-note-details-toggle, button, input, label, select, textarea')) {
                var noteLineToggle = noteLine.querySelector('.small-note-details-toggle');

                if (noteLineToggle) {
                    event.preventDefault();
                    toggleNoteDetails(noteLineToggle);
                }

                return;
            }

            var modalTrigger = event.target.closest('a[data-ikamy-modal-target]');

            if (modalTrigger) {
                var target = modalTrigger.getAttribute('data-ikamy-modal-target');
                var modal = document.querySelector(target);

                if (!modal) {
                    return;
                }

                event.preventDefault();

                if (target === '#ikamy-calendar-modal') {
                    setCalendarModalMode(modal, modalTrigger);
                }

                if (target === '#ikamy-note-modal') {
                    setNoteModalMode(modal, modalTrigger);
                }

                showModal(modal);
                return;
            }

            var dismissButton = event.target.closest('[data-dismiss="modal"]');

            if (dismissButton) {
                var dismissModal = dismissButton.closest('.modal');

                if (dismissModal && (!($ && $.fn.modal) || dismissModal.classList.contains('ikamy-create-modal'))) {
                    event.preventDefault();
                    hideModal(dismissModal);
                }
            }
        });
        };

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initIkamyFooter);
        } else {
            initIkamyFooter();
        }
    })();
</script>


<?php if ($stylesheets == "fade_php") { ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="/public/_js/examples/javascripts/jquery.easing.1.3.js"></script>
    <script src="/public/_js/examples/javascripts/jquery.animate-enhanced.min.js"></script>
    <script src="/public/_js/dist/jquery.superslides.js" type="text/javascript" charset="utf-8"></script>
    <script>
        $('#slides').superslides({
            animation: 'fade'
        });
    </script>


<?php } ?>

<?php
if (substr($Nav->current_page, 0, 7) == "manage_" ||
    substr($Nav->current_page, 0, 4) == "new_" ||
    substr($Nav->current_page, 0, 5) == "edit_"
    || $Nav->current_page == 'profile'
) { ?>

    <script src="<?php echo $Nav->path_public; ?>js/plugins/pace/pace.min.js"></script>
    <script src="<?php echo $Nav->path_public; ?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Chosen -->
    <script src="<?php echo $Nav->path_public; ?>js/plugins/chosen/chosen.jquery.js"></script>

    <!-- JSKnob -->
    <script src="<?php echo $Nav->path_public; ?>js/plugins/jsKnob/jquery.knob.js"></script>

    <!-- Input Mask-->
    <script src="<?php echo $Nav->path_public; ?>js/plugins/jasny/jasny-bootstrap.min.js"></script>

    <!-- Data picker -->
    <script src="<?php echo $Nav->path_public; ?>js/plugins/datapicker/bootstrap-datepicker.js"></script>

    <!-- NouSlider -->
    <script src="<?php echo $Nav->path_public; ?>js/plugins/nouslider/jquery.nouislider.min.js"></script>

    <!-- Switchery -->
    <script src="<?php echo $Nav->path_public; ?>js/plugins/switchery/switchery.js"></script>

    <!-- IonRangeSlider -->
    <script src="<?php echo $Nav->path_public; ?>js/plugins/ionRangeSlider/ion.rangeSlider.min.js"></script>

    <!-- iCheck -->
    <script src="<?php echo $Nav->path_public; ?>js/plugins/iCheck/icheck.min.js"></script>

    <!-- MENU -->
    <script src="<?php echo $Nav->path_public; ?>js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Color picker -->
    <script src="<?php echo $Nav->path_public; ?>js/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>

    <!-- Clock picker -->
    <script src="<?php echo $Nav->path_public; ?>js/plugins/clockpicker/clockpicker.js"></script>

    <!-- Image cropper -->
    <script src="<?php echo $Nav->path_public; ?>js/plugins/cropper/cropper.min.js"></script>

    <!-- Date range use moment.js same as full calendar plugin -->
    <script src="<?php echo $Nav->path_public; ?>js/plugins/fullcalendar/moment.min.js"></script>

    <!-- Date range picker -->
    <script src="<?php echo $Nav->path_public; ?>js/plugins/daterangepicker/daterangepicker.js"></script>

    <!-- Typehead -->
    <script src="<?php echo $Nav->path_public; ?>js/plugins/typehead/bootstrap3-typeahead.min.js"></script>

    <!-- Select2 -->
    <script src="<?php echo $Nav->path_public; ?>js/plugins/select2/select2.full.min.js"></script>

    <!-- TouchSpin -->
    <script src="<?php echo $Nav->path_public; ?>js/plugins/touchspin/jquery.bootstrap-touchspin.min.js"></script>

    <script src="<?php echo $Nav->path_public . "myjs/formKamy.js"; ?>"></script>

    <!--    <script>  $('.clockpicker').clockpicker();</script>-->

<?php } ?>




<?php if (isset($javascript) && $javascript == "some_data") { ?>
    <script src="<?php echo $Nav->path_public . "myjs/some_data"; ?>"></script>
<?php } ?>


<?php if (isset($javascript) && $javascript == "InvoiceActual") { ?>
    <script src="<?php echo $Nav->path_public; ?>myjs/InvoiceActual.js"></script>
<?php } ?>


<?php if (isset($javascript) && $javascript == "InvoiceActual_Row") { ?>
    <script src="<?php echo $Nav->path_public; ?>myjs/InvoiceActual_Row.js"></script>
<?php } ?>

<?php if (isset($javascript) && $javascript == "ajax") { ?>
    <script src="<?php echo $Nav->path_public; ?>myjs/ajax_db.js"></script>
<?php } ?>

<script>
$(document).ready(function () {
    function validateIkamyForm(form) {
        var $form = $(form);
        var firstInvalid = null;

        $form.find('.js-inline-error').remove();
        $form.find('.js-validation-summary').remove();
        $form.find('.has-error').removeClass('has-error');
        $form.find('[aria-invalid="true"]').removeAttr('aria-invalid');

        $form.find('[required]').each(function () {
            var field = this;
            var $field = $(field);
            var invalid = false;
            var errorText = '';

            if (field.type === 'radio') {
                invalid = $form.find('input[type="radio"][name="' + field.name + '"]:checked').length === 0;
            } else {
                invalid = $.trim($field.val() || '') === '';
            }

            if (!invalid && field.validity && !field.validity.valid) {
                invalid = true;
            }

            if (!invalid && $field.data('disallow-zero') && $.trim($field.val() || '') !== '' && parseFloat($field.val()) === 0) {
                invalid = true;
                errorText = 'cannot be zero.';
            }

            if (!invalid) {
                return;
            }

            var $group = $field.closest('.form-group');
            var label = $.trim($group.find('label').first().text()) || field.name;
            var message = '';
            var $target = $field.closest('div[class*="col-sm-"], .input-group');

            if (!$group.length) {
                $group = $field.parent();
            }

            if (!$target.length) {
                $target = $field.parent();
            }

            if (!errorText) {
                errorText = 'is required.';
            }

            $group.addClass('has-error');
            $field.attr('aria-invalid', 'true');
            message = $('<div>').text(label + ' ' + errorText).html();
            $target.append('<p class="help-block js-inline-error">' + message + '</p>');

            if (!firstInvalid) {
                firstInvalid = field;
            }
        });

        if (!firstInvalid) {
            return true;
        }

        $form.prepend('<div class="alert alert-danger js-validation-summary">Please correct the highlighted fields.</div>');
        $('html, body').animate({scrollTop: Math.max($form.offset().top - 80, 0)}, 200);
        $(firstInvalid).focus();
        return false;
    }

    $('form.form-horizontal').on('submit', function (event) {
        if (!validateIkamyForm(this)) {
            event.preventDefault();
        }
    });

    $('form.form-horizontal').on('click', 'button[type="submit"], input[type="submit"]', function (event) {
        if (!validateIkamyForm(this.form)) {
            event.preventDefault();
        }
    });
});
</script>

<script src="<?php echo $Nav->path_public; ?>js/test_tooltips.js"></script>

<?php echo str_repeat("<br>", 50) ?>

</body>


</html>
<?php if (isset($database)) {
    $database->close_connection();
} ?>

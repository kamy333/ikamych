<footer class="navbar-fixed-bottom my_footer" role="contentinfo">
    <div class="my_footer__inner">
        <p class="my_footer__copyright">
            <small>&#xA9;&nbsp;2014 - <?php echo date("Y"); ?>,<?php echo " " . $logo; ?></small>
        </p>
        <div class="socialmediaicons my_footer__social" aria-label="Social links"></div>
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

        var syncNavbarDropdownActive = function() {
            var nav = document.querySelector('.navbar-default .navbar-nav');

            if (!nav) {
                return;
            }

            var openDropdown = nav.querySelector('li.dropdown.open');

            nav.querySelectorAll('li.dropdown').forEach(function(item) {
                var isOpen = item === openDropdown;
                item.classList.toggle('ikamy-nav-open-active', isOpen);
                item.classList.toggle('ikamy-nav-active-muted', !!openDropdown && item.classList.contains('active') && !isOpen);
            });
        };

        var scheduleNavbarDropdownActiveSync = function() {
            window.setTimeout(syncNavbarDropdownActive, 0);
        };

        document.addEventListener('click', scheduleNavbarDropdownActiveSync);
        document.addEventListener('keyup', scheduleNavbarDropdownActiveSync);

        if ($) {
            $('.navbar-default .navbar-nav > li.dropdown').on('shown.bs.dropdown hidden.bs.dropdown', syncNavbarDropdownActive);
        }

        syncNavbarDropdownActive();

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

        var modalReturnTo = function() {
            try {
                var url = new URL(window.location.href);
                url.searchParams.delete('ikamy_modal');
                url.searchParams.delete('ikamy_modal_status');
                url.searchParams.delete('ikamy_modal_id');

                return url.pathname + url.search;
            } catch (error) {
                return window.location.pathname + window.location.search;
            }
        };

        var setModalStatus = function(modal, message, type) {
            var status = modal.querySelector('.ikamy-create-modal__status');

            if (!status) {
                return;
            }

            if (!message) {
                status.hidden = true;
                status.className = 'ikamy-create-modal__status';
                status.textContent = '';
                return;
            }

            status.hidden = false;
            status.className = 'ikamy-create-modal__status ikamy-create-modal__status--' + (type || 'success');
            status.textContent = message;
        };

        var setModalReturnTo = function(form) {
            setInputValue(form, 'input[name="return_to"]', modalReturnTo());
        };

        var setCalendarModalReturnTo = function(form) {
            if (/\/public\/calendar\.php$/.test(window.location.pathname)) {
                setModalReturnTo(form);
                return;
            }

            setInputValue(form, 'input[name="return_to"]', '/public/calendar.php');
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

            setCalendarModalReturnTo(form);
            setModalStatus(modal, '', 'success');

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

            setModalReturnTo(form);
            setModalStatus(modal, '', 'success');

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

        var setExpenseModalMode = function(modal) {
            var form = modal.querySelector('form.ikamy-create-modal__form');
            var submit = modal.querySelector('.ikamy-create-modal__submit');

            if (!form) {
                return;
            }

            form.action = form.getAttribute('data-create-action') || form.action;
            setModalReturnTo(form);
            setModalStatus(modal, '', 'success');
            setInputValue(form, 'input[name="id"]', '');
            setInputValue(form, 'input[name="amount"]', '');
            setInputValue(form, 'select[name="ccy_id"]', '1');
            setInputValue(form, 'input[name="rate"]', '1');
            setInputValue(form, 'input[name="expense_date"]', '<?php echo h(date('Y-m-d')); ?>');
            setInputValue(form, 'select[name="person_id"]', '2');
            setInputValue(form, 'select[name="expense_type_id"]', '');
            setRadioValue(form, 'cash', '0');
            setInputValue(form, 'textarea[name="comment"]', '');
            setInputValue(form, 'input[name="document"]', '');
            setInputValue(form, 'input[name="modification_time"]', '<?php echo h(datetime_sql()); ?>');

            if (submit) {
                submit.innerHTML = '<i class="fa fa-money" aria-hidden="true"></i> Create expense';
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

        var appendUrlParam = function(url, key, value) {
            try {
                var parsedUrl = new URL(url, window.location.href);
                parsedUrl.searchParams.set(key, value);
                return parsedUrl.pathname + parsedUrl.search + parsedUrl.hash;
            } catch (error) {
                return url;
            }
        };

        var setCrudModalMode = function(triggerElement) {
            var modal = document.getElementById('adminCrudModal');
            var frame = document.getElementById('adminCrudModalFrame');
            var title = document.getElementById('adminCrudModalTitle');

            if (!modal || !frame || !triggerElement) {
                return false;
            }

            var href = triggerElement.getAttribute('href') || '';
            href = appendUrlParam(href, 'crud_modal', '1');
            href = appendUrlParam(href, 'return_to', modalReturnTo());

            frame.setAttribute('src', href);
            if (title) {
                title.textContent = modal.getAttribute('data-admin-crud-page-name') || 'Record';
            }

            showModal(modal);
            return true;
        };

        var showCrudStatus = function(status, className, recordId) {
            var messageTarget = document.getElementById('message-ajax') || document.getElementById('message-php');

            if (!messageTarget) {
                return;
            }

            var verb = status === 'updated' ? 'updated' : (status === 'error' ? 'could not be saved' : 'created');
            var alertClass = status === 'error' ? 'alert-danger' : 'alert-success';
            var label = className || 'Record';
            var suffix = recordId ? ' #' + recordId : '';
            messageTarget.innerHTML = '<div class="alert ' + alertClass + ' admin-crud-alert" role="alert">' +
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                '<strong>' + label + suffix + '</strong> ' + verb + '.' +
                '</div>';
            messageTarget.style.display = 'block';
        };

        var handleCrudStatusFromUrl = function() {
            var params;

            try {
                params = new URLSearchParams(window.location.search);
            } catch (error) {
                return;
            }

            var status = params.get('crud_modal_status');
            if (!status) {
                return;
            }

            var className = params.get('crud_modal_class') || '';
            var recordId = params.get('crud_modal_id') || '';

            if (window.parent && window.parent !== window) {
                window.parent.postMessage({
                    type: 'ikamyCrudModalSaved',
                    status: status,
                    className: className,
                    recordId: recordId
                }, window.location.origin);
                return;
            }

            showCrudStatus(status, className, recordId);

            try {
                var cleanUrl = new URL(window.location.href);
                cleanUrl.searchParams.delete('crud_modal_status');
                cleanUrl.searchParams.delete('crud_modal_class');
                cleanUrl.searchParams.delete('crud_modal_id');
                window.history.replaceState({}, document.title, cleanUrl.pathname + cleanUrl.search);
            } catch (error) {
            }
        };

        window.addEventListener('message', function(event) {
            if (event.origin !== window.location.origin || !event.data) {
                return;
            }

            if (event.data.type === 'ikamyCrudModalCancel') {
                var cancelModal = document.getElementById('adminCrudModal');
                if (cancelModal) {
                    hideModal(cancelModal);
                }
                return;
            }

            if (event.data.type === 'ikamyCrudModalSaved') {
                var savedModal = document.getElementById('adminCrudModal');
                if (savedModal) {
                    hideModal(savedModal);
                }
                showCrudStatus(event.data.status, event.data.className, event.data.recordId);
                window.setTimeout(function() {
                    window.location.reload();
                }, 700);
            }
        });

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

        var managementScrollState = null;
        var adminCrudPageScrollState = null;
        var suppressManagementScrollbarClick = false;
        var suppressManagementScrollbarClickTimer = null;

        var scheduleManagementScrollbarClickRelease = function() {
            if (suppressManagementScrollbarClickTimer) {
                window.clearTimeout(suppressManagementScrollbarClickTimer);
            }

            suppressManagementScrollbarClickTimer = window.setTimeout(function() {
                suppressManagementScrollbarClick = false;
                suppressManagementScrollbarClickTimer = null;
            }, 450);
        };

        var isManagementDropdownOpen = function(dropdown) {
            var parent = dropdown ? dropdown.closest('.ikamy-management-menu') : null;

            return !!(dropdown && parent && parent.classList.contains('open') && dropdown.offsetParent !== null);
        };

        var ensureManagementScrollbar = function(dropdown) {
            if (dropdown._ikamyScrollbar) {
                return dropdown._ikamyScrollbar;
            }

            var track = document.createElement('div');
            var thumb = document.createElement('div');

            track.className = 'ikamy-management-scrollbar';
            thumb.className = 'ikamy-management-scrollbar__thumb';
            track.setAttribute('aria-hidden', 'true');
            track.style.display = 'none';
            track._ikamyDropdown = dropdown;
            track.appendChild(thumb);
            document.body.appendChild(track);

            dropdown._ikamyScrollbar = {
                track: track,
                thumb: thumb
            };

            return dropdown._ikamyScrollbar;
        };

        var setManagementScrollbarHidden = function(dropdown) {
            if (dropdown && dropdown._ikamyScrollbar) {
                dropdown._ikamyScrollbar.track.style.display = 'none';
                dropdown._ikamyScrollbar.track.classList.remove('is-dragging');
            }
        };

        var updateManagementScrollbar = function(dropdown) {
            if (!dropdown) {
                return;
            }

            var scrollbar = ensureManagementScrollbar(dropdown);
            var track = scrollbar.track;
            var thumb = scrollbar.thumb;
            var scrollable = dropdown.scrollHeight - dropdown.clientHeight;

            if (!isManagementDropdownOpen(dropdown) || scrollable <= 1) {
                setManagementScrollbarHidden(dropdown);
                return;
            }

            var rect = dropdown.getBoundingClientRect();
            var railPadding = 7;
            var trackWidth = 18;
            var trackHeight = Math.max(rect.height - (railPadding * 2), 44);
            var thumbHeight = Math.max(42, Math.min(trackHeight, trackHeight * (dropdown.clientHeight / dropdown.scrollHeight)));
            var maxThumbTop = Math.max(trackHeight - thumbHeight, 0);
            var thumbTop = (dropdown.scrollTop / scrollable) * maxThumbTop;

            track.style.display = 'block';
            track.style.left = Math.round(rect.right - trackWidth - 8) + 'px';
            track.style.top = Math.round(rect.top + railPadding) + 'px';
            track.style.height = Math.round(trackHeight) + 'px';
            thumb.style.top = Math.round(thumbTop) + 'px';
            thumb.style.height = Math.round(thumbHeight) + 'px';
        };

        var updateAllManagementScrollbars = function() {
            document.querySelectorAll('.ikamy-management-dropdown').forEach(function(dropdown) {
                updateManagementScrollbar(dropdown);
            });
        };

        var isAdminCrudScrollablePage = function() {
            return document.body.classList.contains('admin-crud-manage-body') ||
                document.body.classList.contains('crud-modal-body');
        };

        var ensureAdminCrudPageScrollbar = function() {
            if (!isAdminCrudScrollablePage()) {
                return null;
            }

            var existing = document.querySelector('.admin-crud-page-scrollbar');
            if (existing) {
                return {
                    track: existing,
                    thumb: existing.querySelector('.admin-crud-page-scrollbar__thumb')
                };
            }

            var track = document.createElement('div');
            var thumb = document.createElement('div');

            track.className = 'admin-crud-page-scrollbar';
            thumb.className = 'admin-crud-page-scrollbar__thumb';
            track.setAttribute('aria-hidden', 'true');
            track.style.display = 'none';
            track.appendChild(thumb);
            document.body.appendChild(track);

            return {
                track: track,
                thumb: thumb
            };
        };

        var updateAdminCrudPageScrollbar = function() {
            var scrollbar = ensureAdminCrudPageScrollbar();

            if (!scrollbar || !scrollbar.track || !scrollbar.thumb) {
                return;
            }

            var doc = document.documentElement;
            var scrollable = Math.max(doc.scrollHeight - doc.clientHeight, 0);

            if (scrollable <= 1 || (document.body.classList.contains('admin-crud-manage-body') && document.body.classList.contains('modal-open'))) {
                scrollbar.track.style.display = 'none';
                scrollbar.track.classList.remove('is-dragging');
                return;
            }

            var isCrudModalFrame = document.body.classList.contains('crud-modal-body');
            var top = isCrudModalFrame ? 10 : 76;
            var bottom = isCrudModalFrame ? 10 : 46;
            var trackHeight = Math.max(window.innerHeight - top - bottom, 90);
            var thumbHeight = Math.max(48, Math.min(trackHeight, trackHeight * (doc.clientHeight / doc.scrollHeight)));
            var maxThumbTop = Math.max(trackHeight - thumbHeight, 0);
            var thumbTop = (window.scrollY / scrollable) * maxThumbTop;

            scrollbar.track.style.display = 'block';
            scrollbar.track.style.top = top + 'px';
            scrollbar.track.style.height = Math.round(trackHeight) + 'px';
            scrollbar.thumb.style.top = Math.round(thumbTop) + 'px';
            scrollbar.thumb.style.height = Math.round(thumbHeight) + 'px';
        };

        var isScrollableInsideAdminCrudPage = function(target) {
            var node = target;

            while (node && node !== document.body && node !== document.documentElement) {
                if (node.closest && node.closest('.modal, .dropdown-menu, textarea, select')) {
                    return true;
                }

                var style = window.getComputedStyle(node);
                var overflowY = style.overflowY;
                var canScroll = (overflowY === 'auto' || overflowY === 'scroll') && node.scrollHeight > node.clientHeight + 1;

                if (canScroll) {
                    return true;
                }

                node = node.parentElement;
            }

            return false;
        };

        var handleAdminCrudPageWheel = function(event) {
            if (!isAdminCrudScrollablePage() || event.ctrlKey || event.metaKey) {
                return;
            }

            if (isScrollableInsideAdminCrudPage(event.target)) {
                return;
            }

            var doc = document.documentElement;
            var scrollable = Math.max(doc.scrollHeight - doc.clientHeight, 0);

            if (scrollable <= 1) {
                return;
            }

            var delta = event.deltaY;

            if (event.deltaMode === 1) {
                delta *= 16;
            } else if (event.deltaMode === 2) {
                delta *= window.innerHeight;
            }

            event.preventDefault();
            window.scrollTo(0, Math.max(0, Math.min(scrollable, window.scrollY + delta)));
            updateAdminCrudPageScrollbar();
        };

        var scrollAdminCrudPageToPointer = function(clientY, dragOffset) {
            var scrollbar = ensureAdminCrudPageScrollbar();

            if (!scrollbar || !scrollbar.track || !scrollbar.thumb) {
                return;
            }

            var doc = document.documentElement;
            var trackRect = scrollbar.track.getBoundingClientRect();
            var thumbHeight = scrollbar.thumb.offsetHeight || 48;
            var usableHeight = Math.max(trackRect.height - thumbHeight, 1);
            var scrollable = Math.max(doc.scrollHeight - doc.clientHeight, 0);
            var localY = Math.max(0, Math.min(usableHeight, clientY - trackRect.top - dragOffset));

            window.scrollTo(0, (localY / usableHeight) * scrollable);
            updateAdminCrudPageScrollbar();
        };

        var scrollManagementToPointer = function(dropdown, clientY, dragOffset) {
            var scrollbar = ensureManagementScrollbar(dropdown);
            var trackRect = scrollbar.track.getBoundingClientRect();
            var thumbHeight = scrollbar.thumb.offsetHeight || 42;
            var usableHeight = Math.max(trackRect.height - thumbHeight, 1);
            var scrollable = Math.max(dropdown.scrollHeight - dropdown.clientHeight, 0);
            var localY = Math.max(0, Math.min(usableHeight, clientY - trackRect.top - dragOffset));

            dropdown.scrollTop = (localY / usableHeight) * scrollable;
            updateManagementScrollbar(dropdown);
        };

        var handleManagementScrollbarStart = function(event) {
            var track = event.target.closest ? event.target.closest('.ikamy-management-scrollbar') : null;

            if (!track || !track._ikamyDropdown) {
                return;
            }

            var dropdown = track._ikamyDropdown;
            var thumb = dropdown._ikamyScrollbar.thumb;
            var thumbRect = thumb.getBoundingClientRect();
            var isThumb = event.target === thumb;
            var dragOffset = isThumb ? event.clientY - thumbRect.top : thumbRect.height / 2;

            event.preventDefault();
            event.stopPropagation();
            event.stopImmediatePropagation();
            suppressManagementScrollbarClick = true;
            track.classList.add('is-dragging');

            if (track.setPointerCapture && event.pointerId !== undefined) {
                try {
                    track.setPointerCapture(event.pointerId);
                } catch (captureError) {
                    // Some older browsers do not allow capture here; the document handlers still cover dragging.
                }
            }

            scrollManagementToPointer(dropdown, event.clientY, dragOffset);

            managementScrollState = {
                dropdown: dropdown,
                dragOffset: dragOffset
            };
        };

        var handleAdminCrudPageScrollbarStart = function(event) {
            var track = event.target.closest ? event.target.closest('.admin-crud-page-scrollbar') : null;

            if (!track) {
                return;
            }

            var thumb = track.querySelector('.admin-crud-page-scrollbar__thumb');
            var thumbRect = thumb.getBoundingClientRect();
            var isThumb = event.target === thumb;
            var dragOffset = isThumb ? event.clientY - thumbRect.top : thumbRect.height / 2;

            event.preventDefault();
            event.stopPropagation();
            event.stopImmediatePropagation();
            track.classList.add('is-dragging');

            if (track.setPointerCapture && event.pointerId !== undefined) {
                try {
                    track.setPointerCapture(event.pointerId);
                } catch (captureError) {
                    // Document handlers still cover dragging when pointer capture is not available.
                }
            }

            scrollAdminCrudPageToPointer(event.clientY, dragOffset);

            adminCrudPageScrollState = {
                track: track,
                dragOffset: dragOffset
            };
        };

        var handleManagementScrollbarMove = function(event) {
            if (!managementScrollState) {
                return;
            }

            event.preventDefault();
            event.stopPropagation();
            event.stopImmediatePropagation();
            scrollManagementToPointer(managementScrollState.dropdown, event.clientY, managementScrollState.dragOffset);
        };

        var handleAdminCrudPageScrollbarMove = function(event) {
            if (!adminCrudPageScrollState) {
                return;
            }

            event.preventDefault();
            event.stopPropagation();
            event.stopImmediatePropagation();
            scrollAdminCrudPageToPointer(event.clientY, adminCrudPageScrollState.dragOffset);
        };

        var handleManagementScrollbarEnd = function(event) {
            if (!managementScrollState) {
                return;
            }

            event.preventDefault();
            event.stopPropagation();
            event.stopImmediatePropagation();

            if (managementScrollState.dropdown && managementScrollState.dropdown._ikamyScrollbar) {
                var track = managementScrollState.dropdown._ikamyScrollbar.track;
                track.classList.remove('is-dragging');

                if (track.releasePointerCapture && event.pointerId !== undefined) {
                    try {
                        track.releasePointerCapture(event.pointerId);
                    } catch (captureError) {
                        // Ignore failed release; the capture may already be gone.
                    }
                }
            }

            managementScrollState = null;
            suppressManagementScrollbarClick = true;
            scheduleManagementScrollbarClickRelease();
        };

        var handleAdminCrudPageScrollbarEnd = function(event) {
            if (!adminCrudPageScrollState) {
                return;
            }

            event.preventDefault();
            event.stopPropagation();
            event.stopImmediatePropagation();
            adminCrudPageScrollState.track.classList.remove('is-dragging');

            if (adminCrudPageScrollState.track.releasePointerCapture && event.pointerId !== undefined) {
                try {
                    adminCrudPageScrollState.track.releasePointerCapture(event.pointerId);
                } catch (captureError) {
                    // Ignore failed release; the capture may already be gone.
                }
            }

            adminCrudPageScrollState = null;
        };

        document.querySelectorAll('.ikamy-management-dropdown').forEach(function(dropdown) {
            ensureManagementScrollbar(dropdown);
            dropdown.addEventListener('scroll', function() {
                updateManagementScrollbar(dropdown);
            });
        });

        updateAdminCrudPageScrollbar();

        document.addEventListener('pointerdown', handleManagementScrollbarStart, true);
        document.addEventListener('pointerdown', handleAdminCrudPageScrollbarStart, true);
        document.addEventListener('pointermove', handleManagementScrollbarMove, true);
        document.addEventListener('pointermove', handleAdminCrudPageScrollbarMove, true);
        document.addEventListener('pointerup', handleManagementScrollbarEnd, true);
        document.addEventListener('pointerup', handleAdminCrudPageScrollbarEnd, true);
        document.addEventListener('pointercancel', handleManagementScrollbarEnd, true);
        document.addEventListener('pointercancel', handleAdminCrudPageScrollbarEnd, true);
        document.addEventListener('wheel', handleAdminCrudPageWheel, { capture: true, passive: false });

        document.addEventListener('click', function(event) {
            var track = event.target.closest ? event.target.closest('.ikamy-management-scrollbar') : null;

            if (!track && !suppressManagementScrollbarClick) {
                return;
            }

            event.preventDefault();
            event.stopPropagation();
            event.stopImmediatePropagation();
            suppressManagementScrollbarClick = false;

            if (suppressManagementScrollbarClickTimer) {
                window.clearTimeout(suppressManagementScrollbarClickTimer);
                suppressManagementScrollbarClickTimer = null;
            }

            updateAllManagementScrollbars();
        }, true);

        document.addEventListener('click', function() {
            window.setTimeout(updateAllManagementScrollbars, 0);
        });

        window.addEventListener('resize', updateAllManagementScrollbars);
        window.addEventListener('scroll', updateAllManagementScrollbars, true);
        window.addEventListener('resize', updateAdminCrudPageScrollbar);
        window.addEventListener('scroll', updateAdminCrudPageScrollbar, true);

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

                if (target === '#ikamy-expense-modal') {
                    setExpenseModalMode(modal);
                }

                showModal(modal);
                return;
            }

            var crudSearchTrigger = event.target.closest('[data-admin-crud-search-modal]');

            if (crudSearchTrigger && (!($ && $.fn.modal))) {
                var searchTarget = crudSearchTrigger.getAttribute('data-admin-crud-search-modal');
                var searchModal = searchTarget ? document.querySelector(searchTarget) : null;

                if (searchModal) {
                    event.preventDefault();
                    showModal(searchModal);
                    return;
                }
            }

            var crudModalTrigger = event.target.closest('a[data-admin-crud-modal]');

            if (crudModalTrigger) {
                if (document.getElementById('adminCrudModal')) {
                    event.preventDefault();
                    setCrudModalMode(crudModalTrigger);
                }
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

        var cssAttributeValue = function(value) {
            return String(value).replace(/\\/g, '\\\\').replace(/"/g, '\\"');
        };

        var cleanReturnedModalUrl = function() {
            try {
                var cleanUrl = new URL(window.location.href);
                cleanUrl.searchParams.delete('ikamy_modal');
                cleanUrl.searchParams.delete('ikamy_modal_status');
                cleanUrl.searchParams.delete('ikamy_modal_id');
                window.history.replaceState({}, document.title, cleanUrl.pathname + cleanUrl.search);
            } catch (error) {
            }
        };

        var scrollToCalendarCard = function(recordId) {
            if (!recordId) {
                return false;
            }

            var card = document.getElementById('calendar-card-' + recordId) ||
                document.querySelector('.ikamy-calendar-card[data-calendar-id="' + cssAttributeValue(recordId) + '"]');

            if (!card) {
                return false;
            }

            card.scrollIntoView({
                behavior: 'smooth',
                block: 'center'
            });
            card.classList.remove('ikamy-calendar-card--recent');

            window.setTimeout(function() {
                card.classList.add('ikamy-calendar-card--recent');
            }, 150);

            window.setTimeout(function() {
                card.classList.remove('ikamy-calendar-card--recent');
            }, 3300);

            return true;
        };

        var autoOpenReturnedModal = function() {
            var params;

            try {
                params = new URLSearchParams(window.location.search);
            } catch (error) {
                return;
            }

            var modalName = params.get('ikamy_modal');
            var status = params.get('ikamy_modal_status');
            var recordId = params.get('ikamy_modal_id') || '';

            if (!modalName || !status) {
                return;
            }

            if (modalName === 'calendar' && status !== 'error') {
                scrollToCalendarCard(recordId);
                cleanReturnedModalUrl();

                return;
            }

            var target = modalName === 'calendar' ? '#ikamy-calendar-modal' : (modalName === 'note' ? '#ikamy-note-modal' : (modalName === 'expense' ? '#ikamy-expense-modal' : ''));
            var modal = target ? document.querySelector(target) : null;

            if (!modal) {
                return;
            }

            var editTrigger = null;
            if (recordId && modalName === 'calendar') {
                editTrigger = document.querySelector('[data-ikamy-calendar-edit="1"][data-calendar-id="' + cssAttributeValue(recordId) + '"]');
            }
            if (recordId && modalName === 'note') {
                editTrigger = document.querySelector('[data-ikamy-note-edit="1"][data-note-id="' + cssAttributeValue(recordId) + '"]');
            }

            if (modalName === 'calendar') {
                setCalendarModalMode(modal, editTrigger || document.createElement('a'));
            } else if (modalName === 'note') {
                setNoteModalMode(modal, editTrigger || document.createElement('a'));
            } else {
                setExpenseModalMode(modal);
            }

            var noun = modalName === 'calendar' ? 'Calendar date' : (modalName === 'note' ? 'Note' : 'Expense');
            var verb = status === 'updated' ? 'updated' : (status === 'error' ? 'could not be saved' : 'created');
            var type = status === 'error' ? 'error' : 'success';
            setModalStatus(modal, noun + ' ' + verb + '.', type);
            showModal(modal);

            cleanReturnedModalUrl();
        };

        autoOpenReturnedModal();
        handleCrudStatusFromUrl();
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

<script>
    (function () {
        if (!('serviceWorker' in navigator)) {
            return;
        }

        if (!window.isSecureContext && !/^localhost$|^127(?:\.\d{1,3}){3}$/.test(window.location.hostname)) {
            return;
        }

        window.addEventListener('load', function () {
            navigator.serviceWorker.register('/service-worker.js', {scope: '/'}).catch(function () {
            });
        });
    })();
</script>

</body>


</html>
<?php if (isset($database)) {
    $database->close_connection();
} ?>

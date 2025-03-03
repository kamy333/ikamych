<?php
// Calendar.php
class CalendarNew {
    public $id;
    public $person;
    public $is_birthday;
    public $title;
    public $start_date;
    public $start_time;
    public $start_datetime;
    public $end_time;
    public $comment;
    public $input_date;

    public function __construct($id, $person, $is_birthday, $title, $start_date, $start_time, $end_time, $comment, $input_date) {
        $this->id = $id;
        $this->person = $person;
        $this->is_birthday = $is_birthday;
        $this->title = $title;
        $this->start_date = $start_date;
        $this->start_time = $start_time;
        $this->start_datetime = $start_date . ' ' . $start_time;
        $this->end_time = $end_time;
        $this->comment = $comment;
        $this->input_date = $input_date;
    }
}

// Simulating a database query for events
$events = [
    new CalendarNew(1, '1', false, 'Meeting with Alice', '2024-12-12', '10:00', '11:00', 'Discuss project updates', '2024-12-11'),
    new CalendarNew(2, '2', true, 'Bob\'s Birthday', '2024-12-13', '00:00', '23:59', 'Celebrate Bob\'s birthday', '2024-12-11'),
    new CalendarNew(3, '1', false, 'Lunch with Charlie', '2024-12-14', '12:30', '14:00', 'Lunch at downtown', '2024-12-11'),
    new CalendarNew(4, '2', false, 'Meeting with Alice', '2024-12-12', '10:00', '11:00', 'Discuss project updates', '2024-12-11'),
    new CalendarNew(5, '2', false, 'Lunch with Charlie', '2024-12-14', '12:30', '14:00', 'Lunch at downtown', '2024-12-11'),
    new CalendarNew(6, '1', false, 'Lunch with Charlie', '2024-12-14', '12:30', '14:00', 'Lunch at downtown', '2024-12-11')


];

// Assign colors to specific persons and random colors for others
$colors = [
    '1' => '#ADD8E6', // Blue for Kamy
    '2' => '#FFB6C1'  // Pink for Mom
];
$colorPalette = ['#90EE90', '#FFD700', '#FFA07A'];
$index = 0;
foreach ($events as $event) {
    if (!isset($colors[$event->person])) {
        $colors[$event->person] = $colorPalette[$index % count($colorPalette)];
        $index++;
    }
}

// Sort events by start_datetime
usort($events, fn($a, $b) => strcmp($a->start_datetime, $b->start_datetime));

function getPersonName($person) {
    return $person === '1' ? 'Kamy' : ($person === '2' ? 'Mom' : 'Other');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="calendar.css">

</head>
<body>
<div class="container">
    <div class="header">
        <h1 class="text-center">Event Calendar</h1>
        <button class="btn btn-primary" style="float: right; margin-top: -50px;" onclick="openModal()">Add Event</button>
    </div>

    <div class="row">
        <?php foreach ($events as $event): ?>
            <div class="col-sm-12">
                <div class="event-card" style="background-color: <?= $colors[$event->person]; ?>;">
                    <div class="event-details">
                        <h3><?= htmlspecialchars($event->title); ?></h3>
                        <p><strong>Person:</strong> <?= htmlspecialchars(getPersonName($event->person)); ?></p>
                        <p><strong>Start:</strong> <?= htmlspecialchars($event->start_datetime); ?></p>
                        <p><strong>End:</strong> <?= htmlspecialchars($event->end_time); ?></p>
                        <p><strong>Comment:</strong> <?= htmlspecialchars($event->comment); ?></p>
                    </div>
                    <div class="buttons">
                        <button class="delete btn btn-danger" onclick="deleteEvent(<?= $event->id; ?>)">Delete</button>

                        <button class="edit btn btn-success"
                                onclick="editEvent('<?= htmlspecialchars(json_encode((array)$event), ENT_QUOTES, 'UTF-8') ?>')">
                            Edit
                        </button>
                        <button class="copy btn btn-primary"
                                onclick="copyEvent('<?= htmlspecialchars(json_encode((array)$event), ENT_QUOTES, 'UTF-8') ?>')">
                            Copy
                        </button>



                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Add/Edit Event Modal -->
    <div id="addEventModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 id="modal-title">Add New Event</h2>
                <span class="close" onclick="closeModal()">&times;</span>
            </div>
            <form id="event-form" action="add_event.php" method="post">
                <input type="hidden" name="id" id="event-id">
                <input type="hidden" name="action" id="event-action" value="add">
                <div class="form-group">
                    <label for="person">Person:</label>
                    <div>
                        <label><input type="radio" name="person" value="1" > Kamy</label>
                        <label><input type="radio" name="person" value="2"> Mom</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="start_date">Start Date:</label>
                    <input type="date" id="start_date" name="start_date" class="form-control" value="<?= date('Y-m-d') ?>" required>
                </div>
                <div class="form-group">
                    <label for="start_time">Start Time:</label>
                    <input type="time" id="start_time" name="start_time" class="form-control">
                </div>
                <div class="form-group">
                    <label for="end_time">End Time:</label>
                    <input type="time" id="end_time" name="end_time" class="form-control">
                </div>
                <div class="form-group">
                    <label for="comment">Comment:</label>
                    <textarea id="comment" name="comment" class="form-control"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" onclick="closeModal()">Close</button>
                    <button type="submit" class="btn btn-success" id="modal-submit">Add Event</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
    function openModal() {
        document.getElementById('event-form').reset();
        document.getElementById('event-id').value = '';
        document.getElementById('event-action').value = 'add';
        document.getElementById('modal-title').innerText = 'Add New Event';
        document.getElementById('modal-submit').innerText = 'Add Event';
        document.getElementById('addEventModal').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('addEventModal').style.display = 'none';
    }

    function editEvent(eventData) {
        try {
            console.log('Editing event:', eventData);
            const event = JSON.parse(eventData);
            console.log('Person:', event.person);
            document.getElementById('event-id').value = event.id;
            document.getElementById('event-action').value = 'edit';
            document.getElementById('modal-title').innerText = 'Edit Event';
            document.getElementById('modal-submit').innerText = 'Edit Event';
            document.getElementById('title').value = event.title;
            document.getElementById('start_date').value = event.start_date;
            document.getElementById('start_time').value = event.start_time;
            document.getElementById('end_time').value = event.end_time;
            document.getElementById('comment').value = event.comment;
            document.querySelector(`input[name="person"][value="${event.person}"]`).checked = true;
            document.querySelector(`input[name="person"][value="${event.person}"]`).checked = true;
            document.getElementById('addEventModal').style.display = 'block';
        } catch (error) {
            console.error('Error parsing event data:', error);
        }
    }

    function copyEvent(eventData) {
        try {
            console.log('Copying event:', eventData);
            const event = JSON.parse(eventData);
            console.log('Person:', event.person);
            document.getElementById('event-id').value = '';
            document.getElementById('event-action').value = 'copy';
            document.getElementById('modal-title').innerText = 'Copy Event';
            document.getElementById('modal-submit').innerText = 'Add Event';
            document.getElementById('title').value = event.title;
            document.getElementById('start_date').value = event.start_date;
            document.getElementById('start_time').value = event.start_time;
            document.getElementById('end_time').value = event.end_time;
            document.getElementById('comment').value = event.comment;
            document.querySelector(`input[name="person"][value="${event.person}"]`).checked = true;
            document.getElementById('addEventModal').style.display = 'block';
        } catch (error) {
            console.error('Error parsing event data:', error);
        }
    }


    function deleteEvent(id) {
        if (confirm('Are you sure you want to delete this event?')) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = 'add_event.php';

            const idInput = document.createElement('input');
            idInput.type = 'hidden';
            idInput.name = 'id';
            idInput.value = id;

            const actionInput = document.createElement('input');
            actionInput.type = 'hidden';
            actionInput.name = 'action';
            actionInput.value = 'delete';

            form.appendChild(idInput);
            form.appendChild(actionInput);
            document.body.appendChild(form);
            form.submit();
        }
    }
</script>
</body>
</html>

<!doctype html>

<div>
    <form method="post">
        @csrf
        <label for="age">age:</label><input type="number" name="age" id="age">
        <label for="name">name:</label><input type="text" name="name" id="name">
        <label for="event_id">event id:</label><input type="number" name="event_id" id="event_id">
        <button type="submit">Mail!</button>
    </form>
</div>

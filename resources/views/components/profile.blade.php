@props(['data'])

<x-card :doctor="$data"/>

<form method="post" action="/doctors/appointment">
    @csrf
    <input type="hidden" name="doctor_id" value="{{ $data->id }}">
    <input type="hidden" name="patient_id" value="{{ Auth::user()->id }}">
    <label for="date">Appointment Date:</label>
    <input name="date" type="date" id="date">
    <button type="submit">Add Appointment</button>
</form>

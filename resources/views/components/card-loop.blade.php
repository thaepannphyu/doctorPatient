@props(['data'])

<div class=" flex flex-wrap  justify-between items-center ">
    @foreach ($data as $doctor)
    <x-card :doctor="$doctor"/>
    @endforeach
</div>
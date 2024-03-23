   

@props(['data'])

@if (Auth::user()->hasRole("admin"))
<x-dashboard>
  <x-admin-sidebar/>
    <x-sideBarToggle/>
    <x-table :data="$data"/>
</x-dashboard>
@elseif (Auth::user()->hasRole("doctor"))
<x-dashboard>
  <x-doctor-sidebar/>
  <x-sideBarToggle/>
  <x-table :data="$data"/>

</x-dashboard>

@else

<x-dashboard>
 <x-card-loop :data="$data"/>
</x-dashboard>

@endif
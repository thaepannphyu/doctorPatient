   

@props(['data'])

@if (Auth::user()->hasRole("admin"))
<x-dashboard>
  <x-admin-sidebar/>
    <x-sideBarToggle/>
    <x-table :data="$data"/>
</x-dashboard>
@endif


@if (Auth::user()->hasRole("doctor"))
<x-dashboard>
  <x-doctor-sidebar/>
  <x-sideBarToggle/>
  <x-table :data="$data"/>

</x-dashboard>
@endif

<x-dashboard>
 <x-card-loop :data="$data"/>
</x-dashboard>
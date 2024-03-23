@props(['data'])


<div class="flex flex-col">
    <div class="-m-1.5 overflow-x-auto">
      <div class="p-1.5 min-w-full inline-block align-middle">
        <div class="overflow-hidden">
          <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead>
              <tr>
                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Name</th>
                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Age</th>
                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Address</th>
                <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">Action</th>
              </tr>
            </thead>
            <tbody>
              @if($data)
                 @foreach ($data as $user)
                     <tr class="odd:bg-white even:bg-gray-100 hover:bg-gray-100 dark:odd:bg-gray-800 dark:even:bg-gray-700 dark:hover:bg-gray-700">
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">{{$user->name}}</td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{$user->name}}</td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{$user->name}}</td>

                   @if (Auth::user()->hasRole("admin"))
                   <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                    @if(!$user->hasRole("doctor"))
                    <a href='users/{{$user->id}}/assign?role=doctor'>
                      <button
                      type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:outline-none dark:focus:ring-1
                      dark:focus:ring-gray-600">
                      Doctor</button>
                     </a>
                    @endif
                    @if(!$user->hasRole("admin"))
                   <a href='users/{{$user->id}}/assign?role=admin'>
                    <button
                    type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:outline-none dark:focus:ring-1
                    dark:focus:ring-gray-600">
                    Admin</button>
                   </a>
                   @endif
                  </td>
                   @endif 
                     
                    </tr>
                      @endforeach
                      @endif
             
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
<!-- Card Section -->
<div class="max-w-4xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <!-- Card -->
    <div class=" rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
      <form  method="POST" action="{{ url('admin/users') }}">
        @csrf
        <!-- Section -->
        <div class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-gray-700 dark:first:border-transparent">
          <div class="sm:col-span-12">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200">
              Submit your application
            </h2>
          </div>
          <!-- End Col -->
          <div class="sm:col-span-3">
            <label for="af-submit-application-email" class="inline-block text-sm font-medium text-gray-500 mt-2.5">
             Name
            </label>
          </div>
          <!-- End Col -->
            <div class="sm:col-span-9">
                <input name="name" type="text" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
            </div>
          <!-- End Col -->
          <!-- End Col -->
          <div class="sm:col-span-3">
            <label for="af-submit-application-email" class="inline-block text-sm font-medium text-gray-500 mt-2.5">
              Email
            </label>
          </div>
          <!-- End Col -->
            <div class="sm:col-span-9">
                <input name="email" type="email" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
            </div>
          <!-- End Col -->
          <!-- End Col -->
          <div class="sm:col-span-3">
            <label for="af-submit-application-email" class="inline-block text-sm font-medium text-gray-500 mt-2.5">
              Password
            </label>
          </div>
          <!-- End Col -->
            <div class="sm:col-span-9">
                <input name="password" type="password" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
            </div>
          <!-- End Col -->
  
          <div class="sm:col-span-3">
            <div class="inline-block">
              <label for="role" class="inline-block text-sm font-medium text-gray-500 mt-2.5">
                Role
              </label>
            </div>
          </div>
          <!-- End Col -->
  
          <div class="sm:col-span-9 ">
           <select name="role" >
            <option value="admin" >admin</option>
            <option value="doctor" >doctor</option>
           </select>
          </div>
          <!-- End Col -->

          
        </div>
        <!-- End Section -->

        <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
          Submit application
        </button>
      </form>
    </div>
    <!-- End Card -->
</div>
<!-- End Card Section -->
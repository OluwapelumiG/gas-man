<x-app-layout>
    <div class = "content ml-12 transform ease-in-out duration-500 pt-20 px-2 md:px-5 pb-4 ">
        <nav class = "flex px-5 py-3 text-gray-700  rounded-lg bg-gray-50 dark:bg-[#1E293B] " aria-label="Breadcrumb">
            <ol class = "inline-flex items-center space-x-1 md:space-x-3">
                <li class = "inline-flex items-center">
                    <a href="#" class = "inline-flex items-center text-xl text-white font-medium hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z" />
                        </svg>
                         Sales
                    </a>
                </li>
                <li>
                    <div>
                        <button onclick="openModal('add-modal')" class='group bg-gradient-to-r dark:from-cyan-500 dark:to-blue-500 from-indigo-500 via-purple-500 to-purple-500 text-white p-2 rounded text-xl font-bold'>
                            New Sale
                        </button>
                    </div>
                </li>
            </ol>
        </nav>
        <div class="mx-auto w-full max-w-full rounded-sm border border-gray-200 bg-white shadow-lg">
            <header class="border-b border-gray-100 px-5 py-4">
                <div class="font-semibold text-gray-800">Sales</div>
            </header>

            <div class="overflow-x-auto p-3">
                <table class="w-full table-auto">
                    <thead class="bg-gray-50 text-xs font-semibold uppercase text-gray-400">
                    <tr>
                        <th></th>
                        <th class="p-2">
                            <div class="text-left font-semibold">Transaction ID</div>
                        </th>
                        <th class="p-2">
                            <div class="text-left font-semibold">Quantity</div>
                        </th>
                        <th class="p-2">
                            <div class="text-left font-semibold">Price</div>
                        </th>
                        <th class="p-2">
                            <div class="text-center font-semibold">Action</div>
                        </th>
                    </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100 text-sm">
                    <!-- record 1 -->
                    <?php $total = 0; $sn = 1; ?>
                    @foreach($sales as $sale)
                        <?php $total += $sale['price']; ?>
                        <tr>
                            <td class="p-2">
                                {{ $sn++ }}
{{--                                <input type="checkbox" class="h-5 w-5" value="id-1" />--}}
                            </td>
                            <td class="p-2">
                                <div class="font-medium text-gray-800">{{ $sale['invoice'] }}</div>
                            </td>
                            <td class="p-2">
                                <div class="text-left">{{ $sale['qty'] }}</div>
                            </td>
                            <td class="p-2">
                                <div class="text-right font-medium text-green-500">&#8358; {{ number_format($sale['price']) }}</div>
                            </td>
                            <td class="p-2">
                                <div class="flex justify-center">
                                    <a href="{{ route('printout', $sale['id']) }}" target="_blank">
                                        <svg class="h-8 w-8 rounded-full p-1 hover:bg-gray-100 hover:text-blue-600" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V11C20.6569 11 22 12.3431 22 14V18C22 19.6569 20.6569 21 19 21H5C3.34314 21 2 19.6569 2 18V14C2 12.3431 3.34315 11 5 11V5ZM5 13C4.44772 13 4 13.4477 4 14V18C4 18.5523 4.44772 19 5 19H19C19.5523 19 20 18.5523 20 18V14C20 13.4477 19.5523 13 19 13V15C19 15.5523 18.5523 16 18 16H6C5.44772 16 5 15.5523 5 15V13ZM7 6V12V14H17V12V6H7ZM9 9C9 8.44772 9.44772 8 10 8H14C14.5523 8 15 8.44772 15 9C15 9.55228 14.5523 10 14 10H10C9.44772 10 9 9.55228 9 9ZM9 12C9 11.4477 9.44772 11 10 11H14C14.5523 11 15 11.4477 15 12C15 12.5523 14.5523 13 14 13H10C9.44772 13 9 12.5523 9 12Z" fill="#000000"></path> </g></svg>
                                    </a>
{{--                                    <button disabled>--}}
{{--                                        <svg class="h-8 w-8 rounded-full p-1 hover:bg-gray-100 hover:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>--}}
{{--                                        </svg>--}}
{{--                                    </button>--}}
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

            <div class="flex justify-end space-x-4 border-t border-gray-100 px-5 py-4 text-2xl font-bold">
                <div>Total</div>
                <div class="text-blue-600"> &#8358;{{ ($total>0) ? number_format($total) : '-' }}</div>
            </div>

            <div class="flex justify-end">
                <!-- send this data to backend (note: use class 'hidden' to hide this input) -->
                <input type="hidden" class="border border-black bg-gray-50" x-model="selected" />
            </div>
        </div>
    </div>

</x-app-layout>

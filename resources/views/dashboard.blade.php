<x-app-layout>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Agregar estilos para la vista de dispositivos pequeños */
        @media (max-width: 768px) {
            .flex-wrap {
                display: flex;
                flex-wrap: wrap;
            }
            .section-small {
                width: 50%;
            }
        }
    </style>
    <div class = "content ml-12 transform ease-in-out duration-500 pt-20 px-2 md:px-5 pb-4 ">
        <nav class = "flex px-5 py-3 text-gray-700  rounded-lg bg-gray-50 dark:bg-[#1E293B] " aria-label="Breadcrumb">
            <ol class = "inline-flex items-center space-x-1 md:space-x-3">
                <li class = "inline-flex items-center">
                    <a href="#" class = "inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                        <svg class = "w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                        Home
                    </a>
                </li>
{{--                <li>--}}
{{--                    <div class = "flex items-center">--}}
{{--                        <svg class = "w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fillRule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clipRule="evenodd"></path></svg>--}}
{{--                        <a href="#" class = "ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">Templates</a>--}}
{{--                    </div>--}}
{{--                </li>--}}
            </ol>
        </nav>
    </div>

    <div class="mx-auto w-full max-w-7xl rounded-sm border border-gray-200 bg-white shadow-lg">
        <header class="border-b border-gray-100 px-5 py-4">
            <div class="font-semibold text-gray-800">Sales</div>
        </header>
{{--        <div class="flex">--}}
            <div class="shadow-lg rounded-lg overflow-hidden">
                <div class="py-3 px-5 bg-gray-50">Sales this week</div>
                <canvas class="p-10" id="chartLine"></canvas>
            </div>
{{--            <div class="shadow-lg rounded-lg overflow-hidden">--}}
{{--                <div class="py-3 px-5 bg-gray-50">Sales this week ()</div>--}}
{{--                <canvas class="p-10" id="chartLine2"></canvas>--}}
{{--            </div>--}}
{{--        </div>--}}




{{--        <div class="antialiased sans-serif bg-gray-200 w-lg min-h-screen ">--}}
{{--            <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">--}}
{{--            <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">--}}
{{--            <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>--}}


            <div x-data="app()" x-cloak class="px-4">
                <div class="max-w-7xl h-5xl mx-auto py-10">
                    <div class="shadow p-6 rounded-lg bg-white">
                        <div class="md:flex md:justify-between md:items-center">
                            <div>
                                <h2 class="text-xl text-gray-800 font-bold leading-tight">Sales</h2>
                                <p class="mb-2 text-gray-600 text-sm">Sales this week</p>
                            </div>

                            <!-- Legends -->
                            <div class="mb-4">
                                <div class="flex items-center">
                                    <div class="w-2 h-2 bg-blue-600 mr-2 rounded-full"></div>
                                    <div class="text-sm text-gray-700">Quantity (KG)</div>
                                </div>
                            </div>
                        </div>


                        <div class="line my-8 relative">
                            <!-- Tooltip -->
                            <template x-if="tooltipOpen == true">
                                <div x-ref="tooltipContainer" class="p-0 m-0 z-10 shadow-lg rounded-lg absolute h-auto block"
                                     :style="`bottom: ${tooltipY}px; left: ${tooltipX}px`"
                                >
                                    <div class="shadow-xs rounded-lg bg-white p-2">
                                        <div class="flex items-center justify-between text-sm">
                                            <div>Sales:</div>
                                            <div class="font-bold ml-2">
                                                <span x-html="tooltipContent"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </template>

                            <!-- Bar Chart -->
                            <div class="flex -mx-2 items-end mb-2">
                                <template x-for="data in chartData">

                                    <div class="px-2 w-1/6">
                                        <div :style="`height: ${data}px`"
                                             class="transition ease-in duration-200 bg-blue-600 hover:bg-blue-400 relative"
                                             @mouseenter="showTooltip($event); tooltipOpen = true"
                                             @mouseleave="hideTooltip($event)"
                                        >
                                            <div x-text="data" class="text-center absolute top-0 left-0 right-0 -mt-6 text-gray-800 text-sm"></div>
                                        </div>
                                    </div>

                                </template>
                            </div>

                            <!-- Labels -->
                            <div class="border-t border-gray-400 mx-auto" :style="`height: 1px; width: ${ 100 - 1/chartData.length*100 + 3}%`"></div>
                            <div class="flex -mx-2 items-end">
                                <template x-for="data in labels">
                                    <div class="px-2 w-1/6">
                                        <div class="bg-red-600 relative">
                                            <div class="text-center absolute top-0 left-0 right-0 h-2 -mt-px bg-gray-400 mx-auto" style="width: 1px"></div>
                                            <div x-text="data" class="text-center absolute top-0 left-0 right-0 mt-3 text-gray-700 text-sm"></div>
                                        </div>
                                    </div>
                                </template>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <script>
                function app() {
                    return {
                        chartData: @json($salesData),
                        labels: @json($daysOfWeek),

                        tooltipContent: '',
                        tooltipOpen: false,
                        tooltipX: 0,
                        tooltipY: 0,
                        showTooltip(e) {
                            console.log(e);
                            this.tooltipContent = e.target.textContent
                            this.tooltipX = e.target.offsetLeft - e.target.clientWidth;
                            this.tooltipY = e.target.clientHeight + e.target.clientWidth;
                        },
                        hideTooltip(e) {
                            this.tooltipContent = '';
                            this.tooltipOpen = false;
                            this.tooltipX = 0;
                            this.tooltipY = 0;
                        }
                    }
                }
            </script>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        //second chart
        // const labels = ["Sunday", "Monday", "Tuesday", "Wednessday", "Thursday", "Friday", "Saturday"];
        const labels = @json($daysOfWeek);
        const data = {
            labels: labels,
            datasets: [
                {
                    label: "Price ()",
                    backgroundColor: "hsl(252, 82.9%, 67.8%)",
                    borderColor: "hsl(252, 82.9%, 67.8%)",
                    data: @json($priceData),
                },
            ],
        };
        const configLineChart = {
            type: "line",
            data,
            options: {},
        };

        var chartLine = new Chart(
            document.getElementById("chartLine"),
            configLineChart
        );

        // chart 2
        const data2 = {
            labels: labels,
            datasets: [
                {
                    label: "Sales ()",
                    backgroundColor: "hsl(59,83%,68%)",
                    borderColor: "hsl(59,81%,68%)",
                    data: @json($priceData),
                },
            ],
        };
        // data: [12, 10, 5, 2, 20, 21, 14],

        const configLineChart2 = {
            type: "line",
            data2,
            options: {},
        };

        var chartLine2 = new Chart(
            document.getElementById("chartLine2"),
            configLineChart2
        );
    </script>
</x-app-layout>

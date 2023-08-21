

<div class="add-modal fixed w-full inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster" style="background: rgba(0,0,0,.7);">
    <div class="border border-blue-500 shadow-lg modal-container bg-white w-4/12 md:max-w-11/12 mx-auto rounded-xl z-50 overflow-y-auto">
        <div class="modal-content py-4 text-left px-6">
            <!--Title-->
            <div class="flex justify-between items-center pb-3">
                <p class="text-2xl font-bold text-gray-500">New Sale</p>
                <div class="modal-close cursor-pointer z-50" onclick="modalClose('add-modal')">
                    <svg class="fill-current text-gray-500" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                         viewBox="0 0 18 18">
                        <path
                            d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                        </path>
                    </svg>
                </div>
            </div>
            <!--Body-->
            <div class="my-5 mr-5 ml-5 flex justify-center">
                <form action="#" method="POST" id="add_caretaker_form"  class="w-full">
                    @csrf
                    <div class="">
                        <div class="">
                            <label for="qty" class="text-md text-gray-600">Quantity (KG)</label>
                        </div>
                        <div class="">
                            <input type="text" id="qty" autocomplete="off" onchange="calcPrice()" name="qty" class="h-3 p-6 w-full border-2 border-gray-300 mb-5 rounded-md" placeholder="Example. 1.5" required>
                        </div>
                        <div class="">
                            <label for="price" class="text-md text-gray-600">Ammount (	&#8358; )</label>
                        </div>
                        <div class="">
                            <input type="text" id="price" autocomplete="off" onchange="calcQty()" name="price" class="h-3 p-6 w-full border-2 border-gray-300 mb-5 rounded-md" placeholder="Example. 500" required>
                        </div>
                        <div class="">
                            <label for="customer" class="text-md text-gray-600">Customer Name <small>(optional)</small></label>
                        </div>
                        <div class="">
                            <input type="text" id="customer" autocomplete="on" name="customer" class="h-3 p-6 w-full border-2 border-gray-300 mb-5 rounded-md" placeholder="">
                        </div>
                    </div>
                </form>
            </div>
            <!--Footer-->
            <div class="flex justify-end pt-2 space-x-14">
                <button
                    class="px-4 bg-gray-200 p-3 rounded text-black hover:bg-gray-300 font-semibold" onclick="modalClose('add-modal')">Cancel</button>
                <button id="sbtn"
                        class="px-4 bg-blue-500 p-3 ml-3 rounded-lg text-white hover:bg-teal-400" onclick="submitAdd();">
                    Confirm
                </button>
                <button id="loading" type="button" class="hidden bg-indigo-400 h-max w-max rounded-lg text-white font-bold hover:bg-indigo-300 hover:cursor-not-allowed duration-[500ms,800ms]" disabled>
                    <div class="flex items-center justify-center m-[10px]">
                        <div class="h-5 w-5 border-t-transparent border-solid animate-spin rounded-full border-white border-4">
                        </div>
                        <div class="ml-2"> Processing... </div>
                    </div>
                </button>
            </div>
        </div>
    </div>
</div>
{{--    <input type="text" id="textInput" placeholder="Type something here">--}}

<script>
    all_modals = ['add-modal']
    all_modals.forEach((modal)=>{
        const modalSelected = document.querySelector('.'+modal);
        modalSelected.classList.remove('fadeIn');
        modalSelected.classList.add('fadeOut');
        modalSelected.style.display = 'none';
    })
    const modalClose = (modal) => {
        const modalToClose = document.querySelector('.'+modal);
        modalToClose.classList.remove('fadeIn');
        modalToClose.classList.add('fadeOut');
        setTimeout(() => {
            modalToClose.style.display = 'none';
        }, 500);
    }

    const openModal = (modal) => {
        const modalToOpen = document.querySelector('.'+modal);
        modalToOpen.classList.remove('fadeOut');
        modalToOpen.classList.add('fadeIn');
        modalToOpen.style.display = 'flex';
    }

    function calcPrice(){
        let qty = $('#qty').val();

        let perqty = 500;
        let abill = 0;

        abill = perqty * qty;
        $('#price').val(abill);
    }

    function calcQty(){
        let price = $('#price').val();

        let perqty = 500;
        let abill = 0;

        abill =  price / perqty;
        $('#qty').val(abill);
    }
    function submitAdd(){
        let qty = $('#qty').val();
        let price = $('#price').val();
        let customer = $('#customer').val();
        let csrf = $('input[name="_token"]').val();
        if(!qty){ AlertToastMaxi("error", "top right", "Enter Quantity"); return; }
        if(!price){ AlertToastMaxi("error", "top right", "Enter Price"); return; }
        $("sbtn").hide();
        $("loading").show();
        let obj = {
            qty: qty,
            price: price,
            customer: customer,
            _token: csrf
        };
        $.ajax({
            type: "POST",
            url: "{!! route('sales.store') !!}",
            data: obj,
            success: function(result) {
                if(result.status === 'saved'){
                    modalClose('add-modal');
                    window.open('/printout/'+result.sale, '_blank');
                    window.location.replace('/sales');
                    toastr.success("Sales Added");
                }
                else{
                    toastr.error("Price doesn't match Quanty!");
                }
            },
            error: function() {
                toastr.error("Something went wrong");
                // AlertToastMaxi("error", "top right", "Processing error");
            }
        });
    }

    $(document).ready(function() {

        $(document).keypress(function(event) {
            // alert(event.keyCode);
            // You can check for specific keys using event.keyCode or event.which
            if ((event.keyCode === 112)||(event.keyCode === 80)) {
                openModal('add-modal');
                $('#price').focus();
                // P

                $(document).keypress(function(event) {
                    if (event.keyCode === 13) {
                        submitAdd();
                    }
                });
            }
            if ((event.keyCode ===113)||(event.keyCode === 81)){
                openModal('add-modal');
                $('#qty').focus();
                // Q

                $(document).keypress(function(event) {
                    if (event.keyCode === 13) {
                        submitAdd();
                    }
                });
            }
            if ((event.keyCode ===120)||(event.keyCode === 88)){
                // X
                modalClose('add-modal');
            }
        });
        $('#qty').on('input', function() {
            var inputVal = $(this).val();
            // Remove any non-numeric and non-decimal characters
            inputVal = inputVal.replace(/[^0-9.]/g, '');
            // Allow only one decimal point
            var decimalCount = (inputVal.match(/\./g) || []).length;
            if (decimalCount > 1) {
                inputVal = inputVal.replace(/\./g, '');
            }
            $(this).val(inputVal);
        });

        $('#price').on('input', function() {
            var inputVal = $(this).val();
            // Remove any non-numeric and non-decimal characters
            inputVal = inputVal.replace(/[^0-9.]/g, '');
            // Allow only one decimal point
            var decimalCount = (inputVal.match(/\./g) || []).length;
            if (decimalCount > 1) {
                inputVal = inputVal.replace(/\./g, '');
            }
            $(this).val(inputVal);
        });

        // $("#textInput").on("keyup", function(event) {
        //     var key = event.key; // Captured key
        //     var keyCode = event.keyCode; // Captured key code
        //     console.log("Key pressed: " + key);
        //     console.log("Key code: " + keyCode);
        // });

    });

</script>

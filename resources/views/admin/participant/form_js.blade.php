@section("js")
    <script type="text/javascript">
        const total_paid_text = document.getElementById("total_paid_text");
        const total_paid = document.getElementById("total_paid");
        updateViewCurrency();
        total_paid.addEventListener("keyup", function (e){
            updateViewCurrency();
        })

        function updateViewCurrency(){
            total_paid_text.innerHTML = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR',maximumFractionDigits: 0 }).format(
                total_paid.value,
            )
        }
    </script>
@endsection


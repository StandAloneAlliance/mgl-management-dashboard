@extends('layouts.admin')

@section('content')
<div class="spinner-overlay" id="spinnerOverlay">
    <div class="spinner"></div>
</div>
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        MGL Management Dashboard
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Course Fetcher</div>

                <div class="card-body">
                    <form action="{{ route('admin.submit.form') }}" method="POST" id="'#bash-form">
                        @csrf
                        <input type="submit" class="btn btn-primary" value="Fetch data from platform" id="payloadSubmit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vanillajs@1.0/dest/cjs/index.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#bash-form').submit(function (event) { // Listen for form submission
                event.preventDefault(); // Prevent default form submission
                
                $.ajax({
                    url: $(this).attr('action'), // Use form's action URL
                    method: 'POST', // Use POST method
                    success: function (response) {
                        alert(response.message);
                    },
                    error: function (error) {
                        console.error('Error:', error);
                    }
                });
            });
        });

        
    </script>
    <script>

        document.getElementById('spinnerOverlay').style.display = 'none';

            document.getElementById('payloadSubmit').addEventListener('click', function(){
                document.getElementById('spinnerOverlay').style.display = 'flex';

                // Hide the spinner overlay after the specified time (in milliseconds)
                setTimeout(function() {
                    document.getElementById('spinnerOverlay').style.display = 'none';
                }, 30000); // 30 seconds (since you're using sleep(30))
            })


    </script>
    
    <script>
        const expand_btn = document.querySelector(".expand-btn");
        let activeIndex;

        expand_btn.addEventListener("click", () =>{
            document.body.classList.toggle("collapsed")
        });

        const current = window.location.href;

        const allLinks = document.querySelectorAll(".sidebar-links a");

        allLinks.forEach((elem) => {
            elem.addEventListener('click', function(){
                const hrefLinkClick = elem.href;

                allLinks.forEach((link) => {
                    if(link.href == hrefLinkClick){
                        link.classList.add("active")
                    } else{
                        link.classList.remove('active')
                    }
                })
            })
        });
    </script>
@endsection

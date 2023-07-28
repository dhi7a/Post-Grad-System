<x-app-layout>
    <b>Thank you for applying with MSU <br></b><br>
    <div class="card">
        <div class="row">
            <br> <b style="color:red; margin-left:10px" > <br>IMPORTANT NOTICE</b> <br>
        </div><br>
        <div>
            <br> <p  style="margin-left:10px; text-align:justify" >Applications are normally take 20 days to process.</p>
        </div>
    </div>

    <!-- Add the View Application Button -->
    <div class="row justify-content-center mt-4">
        <a href="{{ route('student.application.view') }}" class="btn btn-primary">View Your Application</a>
    </div>
</x-app-layout>

<x-app-layout>
    <div class="container" style="margin-left:70px">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Downloads') }}</div>

                    <div class="card-body"> 
                    <ul>
                            <li>
                                <a href="{{ route('download.file', ['filename' => 'Postgraduate Application Form.pdf']) }}">Download Postgraduate Application Form</a>
                            </li><br>
                            <li>
                                <a href="{{ route('download.file', ['filename' => 'Postgraduate Application Form.pdf']) }}">Download Postgraduate Application Form</a>
                            </li>
                            <!-- Add more file download links as needed -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
<x-app-layout>
{{-- @section('content') --}}
    <div class="container">
        <h2>Edit Application</h2>

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('updateApplication', $application->id) }}">
            @csrf

            {{-- Edit Personal Details --}}
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ $personalDetails->name }}" required>

            {{-- Edit Subjects --}}
            <label for="subjects">Subjects:</label>
            <select id="subjects" name="subjects[]" multiple>
                {{-- @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}"{{ in_array($subject->id, $subjects) ? ' selected' : '' }}>
                        {{ $subject->name }}
                    </option>
                @endforeach --}}
            </select>

            {{-- Edit Diplomas --}}
            <label for="diploma">Diploma:</label>
            <input type="text" id="diploma" name="diploma" value="{{ $diplomas->diploma }}" required>

            {{-- Edit Dissertations --}}
            <label for="dissertation">Dissertation:</label>
            <input type="text" id="dissertation" name="dissertation" value="{{ $dissertations->dissertation }}" required>

            {{-- Edit University Studies --}}
            <label for="university_studies">University Studies:</label>
            <input type="text" id="university_studies" name="university_studies" value="{{ $universityStudies->university_studies }}" required>

            {{-- Edit Research Experiences --}}
            <label for="research_experience">Research Experience:</label>
            <input type="text" id="research_experience" name="research_experience" value="{{ $researchExperiences->research_experience }}" required>

            {{-- Edit Relevant Publications --}}
            <label for="relevant_publication">Relevant Publication:</label>
            <input type="text" id="relevant_publication" name="relevant_publication" value="{{ $relevantPublications->relevant_publication }}" required>

            {{-- Edit Employment Experiences --}}
            <label for="employment_experience">Employment Experience:</label>
            <input type="text" id="employment_experience" name="employment_experience" value="{{ $employmentExperiences->employment_experience }}" required>

            {{-- Edit Proposed Field Studies --}}
            <label for="proposed_field_study">Proposed Field Study:</label>
            <input type="text" id="proposed_field_study" name="proposed_field_study" value="{{ $proposedFieldStudies->proposed_field_study }}" required>

            {{-- Edit Referees --}}
            {{-- Assuming you're looping through referees --}}
            @foreach ($referees as $index => $referee)
                <label for="referee_{{ $index }}">Referee {{ $index + 1 }}:</label>
                <input type="text" id="referee_{{ $index }}" name="referees[]" value="{{ $referee->referee }}" required>
            @endforeach

            {{-- Edit Documents --}}
            {{-- Assuming you're looping through documents --}}
            @foreach ($documents as $index => $document)
                <label for="document_{{ $index }}">Document {{ $index + 1 }}:</label>
                <input type="text" id="document_{{ $index }}" name="documents[]" value="{{ $document->document }}" required>
            @endforeach

            <button type="submit" class="btn btn-primary">Update Application</button>
        </form>
    </div>
{{-- @endsection --}}
</x-app-layout>

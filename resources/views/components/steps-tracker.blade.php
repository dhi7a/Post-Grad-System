<!-- resources/views/components/steps-tracker.blade.php -->
<div class="steps-tracker">
    @foreach ($steps as $index => $step)
        <div class="step {{ $currentStep === $index ? 'active' : '' }}">
            <span class="step-number">{{ $index + 1 }}</span>
            <span class="step-description">{{ $step }}</span>
        </div>
    @endforeach
</div>

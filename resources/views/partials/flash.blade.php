{{-- Success and error messages from the last action, shown as a dismissible toast --}}
@if (session('success') || session('error'))
    <div class="flash" role="status" aria-live="polite">
        @if (session('success'))
            <p class="alert alert-success">
                <span>{{ session('success') }}</span>
                <button type="button" class="alert-close" aria-label="Dismiss" onclick="this.parentElement.remove()">&times;</button>
            </p>
        @endif
        @if (session('error'))
            <p class="alert alert-error">
                <span>{{ session('error') }}</span>
                <button type="button" class="alert-close" aria-label="Dismiss" onclick="this.parentElement.remove()">&times;</button>
            </p>
        @endif
    </div>
@endif

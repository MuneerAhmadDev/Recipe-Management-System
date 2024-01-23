<x-forms.form action="{{ $route }}" method="POST"
    onsubmit="return confirm('Are you sure you want to delete this record?');">
    @method('delete')
    <button type="submit" style="border: none; background: none;">
        <i class="fa-solid fa-trash text-danger action-button-animate"></i>
    </button>
</x-forms.form>

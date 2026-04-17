<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

```
@php
    $input = fn($name, $type = 'text', $placeholder = '') =>
        "<input type='$type' name='$name' value='".old($name, \$book->$name ?? '')."'
        placeholder='$placeholder'
        class='w-full rounded-xl bg-white/10 border border-white/10 px-3 py-2 text-white'>";
@endphp

<!-- Title -->
<div>
    <label class="text-sm text-blue-100">Title *</label>
    {!! $input('title', 'text', 'Book title') !!}
</div>

<!-- Author -->
<div>
    <label class="text-sm text-blue-100">Author *</label>
    {!! $input('author', 'text', 'Author name') !!}
</div>

<!-- Description -->
<div class="col-span-2">
    <label class="text-sm text-blue-100">Description *</label>
    <textarea name="description"
        class="w-full rounded-xl bg-white/10 border border-white/10 px-3 py-2 text-white"
        placeholder="Short description">{{ old('description', $book->description ?? '') }}</textarea>
</div>

<!-- Genre -->
<div>
    <label class="text-sm text-blue-100">Genre *</label>
    <select name="genre"
        class="w-full rounded-xl bg-white/10 border border-white/10 px-3 py-2 text-white">
        @foreach(['Fiction','Fantasy','Romance'] as $g)
            <option value="{{ $g }}" {{ old('genre', $book->genre ?? '') == $g ? 'selected' : '' }}>
                {{ $g }}
            </option>
        @endforeach
    </select>
</div>

<!-- ISBN -->
<div>
    <label class="text-sm text-blue-100">ISBN *</label>
    {!! $input('isbn', 'text', 'ISBN') !!}
</div>

<!-- Year -->
<div>
    <label class="text-sm text-blue-100">Year *</label>
    {!! $input('published_year', 'number', '2024') !!}
</div>

<!-- Pages -->
<div>
    <label class="text-sm text-blue-100">Pages *</label>
    {!! $input('pages', 'number', '300') !!}
</div>

<!-- Price -->
<div>
    <label class="text-sm text-blue-100">Price *</label>
    {!! $input('price', 'number', '299.99') !!}
</div>

<!-- Available -->
<div class="col-span-2 flex items-center gap-2">
    <input type="checkbox" name="available"
        {{ old('available', $book->available ?? true) ? 'checked' : '' }}>
    <span class="text-sm text-blue-200">Available</span>
</div>
```

</div>

<div>
    @if($type === 'text' || $type === 'email')
        <label for="{{ $name }}" class="col-form-label">{{ $label }}<span class="text-red">*</span></span></label>
        <input type="text" name="{{ $name }}" class="form-control" value="{{ old($name) }}" placeholder="{{ $placeholder }}" />
        @error('{{ $name }}')
        <div class="text-red text-10">{{ $message }}</div>
        @enderror
    @elseif($type === 'email')
    <label for="{{ $name }}">{{ $label }}</label>
    <input type="email" name="{{ $name }}" value="{{ $value ?? '' }}">
    @endif
</div>
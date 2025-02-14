<div class="datatable-wrapper" >
    <table class="table" x-init="InitDatatable($el)" src="{{ $src }}">
        <thead>
            <tr>
                @isset($column)
                    {{ $column }}
                @endisset
            </tr>
        </thead>
        <tbody>
            @isset($content)
                {{ $content }}
            @endisset
        </tbody>
    </table>

</div>

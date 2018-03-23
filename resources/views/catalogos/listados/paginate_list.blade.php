@if(isset($tpaginas) && $tpaginas > 1)
    <nav aria-label="Page navigation" style="border-bottom: 1px solid coral;  padding: 0em !important; margin-bottom: 0.5em !important; ">
        <ul class="pagination pagination-sm" style="margin: 0 !important; padding: 0em !important;">
            <li><span class="paginas-lati bolder-lati">Pág.</span></li>
            @for($i=1;$i<=$tpaginas; $i++)
                <li><a href="{{ route('listItem', ['id' => $id,'npage' => $i, 'tpaginas' => $tpaginas]) }}">{{$i}}</a></li>
            @endfor
        </ul>
    </nav>
@endif

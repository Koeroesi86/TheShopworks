<table class="table table-hover table-bordered">
    <tr>
        <td class="col-sm-5">
            Rota logs for staff member #{{ $staffRecord->id  }}
        </td>
        @for($i = 0; $i <= 6; $i++)
            <td class="col-sm-1">
                @if(isset($staffRecord->rotaDaySlots[$i]))
                    {{ $staffRecord->rotaDaySlots[$i]->workhours }}
                @else
                    0
                @endif
            </td>
        @endfor
    </tr>
    <tr>
        <td class="col-sm-5">Total hours: {{ $staffRecord->getTotalHours() }}</td>
        @foreach($staffRecord->getRotaSlotSummary() as $day => $summaryField)
            <td class="col-sm-1">
                {{ $summaryField }}
            </td>
        @endforeach
    </tr>
</table>
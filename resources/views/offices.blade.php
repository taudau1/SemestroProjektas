<div id="offices" class="tab-pane" role="tabpanel" aria-labelledby="offices-tab" style="width: 300px;">
    <h3 class="text-center">Ofisai</h3>
    
    <div class="mb-3">
        <button class="btn btn-success" id="createNewOfficeBtn">Naujas</button>
    </div>
    
    <div>
        <table class="table table-hover">
        @forelse ($offices as $office)
            <tr>
                <td style="width: 60px;"><img src="//placehold.it/50" alt=""></td>
                <td class="align-middle small">
                    Pavadinimas: {{ $office->name }}<br/>
                    Kaina: {{ $office->price }}<br/>
                    Plotas: {{ $office->area }}
                </td>
            </tr>
        @empty
            <tr>
                <td>Nėra įrašų</td>
            </tr>
        @endforelse
        </table>
    </div>
</div>
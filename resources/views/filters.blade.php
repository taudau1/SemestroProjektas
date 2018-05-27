<div id="filters" class="tab-pane show active" style="width: 283px;">
    <h3 class="text-center">Filtrai</h3>

    <form action="" id="filtersForm">
        <div class="form-group">
            <strong>Rajonas</strong>

            <div class="row">
                <div class="col">
                    <select class="form-control" id="filterDistrict">
                        <option>-</option>
                        @foreach ($districts as $district)
                        <option value="{{ $district->id }}">{{ $district->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <strong>Kaina €</strong>

            <div class="row">
                <div class="col">
                    nuo 
                    <select class="form-control" id="filterPriceMin">
                        <option>-</option>
                        <?php
                        for ($i = 1; $i <= 200; $i++) {
                            $kaina = $i * 100;
                            echo '<option value="' . $kaina . '"">' . $kaina . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col">
                    iki 
                    <select class="form-control" id="filterPriceMax">
                        <option>-</option>
                        <?php
                        for ($i = 1; $i <= 200; $i++) {
                            $kaina = $i * 100;
                            echo '<option value="' . $kaina . '"">' . $kaina . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <strong>Plotas m<sup>2</sup></strong>

            <div class="row">
                <div class="col">
                    nuo 
                    <select class="form-control" id="filterAreaMin">
                        <option>-</option>
                        <?php
                        for ($i = 1; $i <= 200; $i++) {
                            $plotas = $i * 10;
                            echo '<option value="' . $plotas . '"">' . $plotas . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col">
                    iki 
                    <select class="form-control" id="filterAreaMax">
                        <option>-</option>
                        <?php
                        for ($i = 1; $i <= 200; $i++) {
                            $plotas = $i * 10;
                            echo '<option value="' . $plotas . '"">' . $plotas . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <strong>Darbuotojų skaičius</strong>

            <div class="row">
                <div class="col">
                    nuo 
                    <select class="form-control" id="filterWorkersMin">
                        <option>-</option>
                        <?php
                        for ($i = 1; $i <= 500; $i++) {
                            echo '<option value="' . $i . '"">' . $i . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col">
                    iki 
                    <select class="form-control" id="filterWorkersMax">
                        <option>-</option>
                        <?php
                        for ($i = 1; $i <= 500; $i++) {
                            echo '<option value="' . $i . '"">' . $i . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <strong>Vidutinė šildymo kaina mėnesiui €</strong>

            <div class="row">
                <div class="col">
                    nuo 
                    <select class="form-control" id="filterHeatingMin">
                        <option>-</option>
                        <?php
                        for ($i = 1; $i <= 100; $i++) {
                            $kaina = $i * 10;
                            echo '<option value="' . $kaina . '"">' . $kaina . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col">
                    iki 
                    <select class="form-control" id="filterHeatingMax">
                        <option>-</option>
                        <?php
                        for ($i = 1; $i <= 100; $i++) {
                            $kaina = $i * 10;
                            echo '<option value="' . $kaina . '"">' . $kaina . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>

        <?php
        $papildomi = [
            'Apsauga' => [
                'Signalizacija',
                'Bendra pastato apsauga',
            ],
            'Ypatumai / įranga' => [
                'Liftas',
                'Patalpos per du aukštus',
                'Galimybė keisti suplanavimą',
                'Nemokamas patalpų valymas',
                'Vitrininiai langai',
                'Maitinimo įstaiga pastate',
            ],
            'Papildomi įrengimai' => [
                'Internetas',
                'Kondicionavimas',
                'Kompiuteriniai tinklai',
                'Baldai',
                'Telefono linija',
            ],
            'Papildomos patalpos' => [
                'Virtuvė',
                'Dušas',
                'Konferencijų salė pastate',
            ]
        ];
        ?>

        <?php foreach ($papildomi as $key => $value) {
            ?>
            <strong><?= $key ?></strong>
            <?php
            foreach ($value as $text) {
                echo '<div><label class="form-label"><input type="checkbox"></input> ' . $text . '</label></div>';
            }
            ?>
            <?php
        }
        ?>

        <div class="row">
            <div class="col-6">
                <button id="resetFiltersBtn" type="button" class="btn btn-secondary btn-block mt-2">Atšaukti</button>
            </div>
            <div class="col-6">
                <button id="updateFiltersBtn" type="button" class="btn btn-success btn-block mt-2">Atnaujinti</button>
            </div>
        </div>
    </form>
</div>
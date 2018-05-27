var map;
var pointing = false;
var infoWindow;
var offices = [];

function onCursorClick(event) {
    if (pointing) {
        $('#map').removeClass('pointing');
        $('#lat').val(event.latLng.lat);
        $('#lng').val(event.latLng.lng);
        pointing = false;
    }
}

function conjureContent(marker) {
    return '<h4>' + marker.title + '</h4>' +
            '<table style="width: 100%;">' +
            '<tr><td>Rajonas</td><td class="text-right">' + marker.district + "</td></tr>" +
            '<tr><td>Kaina</td><td class="text-right">' + marker.price + " €</td></tr>" +
            '<tr><td>Plotas</td><td class="text-right">' + marker.area + " m<sup>2</sup></td></tr>" +
            '<tr><td>Darbuotojų skaičius</td><td class="text-right">' + marker.workers + "</td></tr>" +
            '<tr><td>Šildymo kaina</td><td class="text-right">' + marker.heating + " €</td></tr>" +
            '</table>';
}

function createNewMarker(marker) {
    let newMarker = new google.maps.Marker({
        position: {lat: marker.lat, lng: marker.lng},
        title: marker.name,
        districtId: marker.district,
        district: districts[marker.district - 1].name,
        price: marker.price,
        area: marker.area,
        heating: marker.heating,
        workers: marker.workers
    });

    newMarker.setMap(map);
    newMarker.addListener('click', function () {
        infoWindow.setContent(conjureContent(newMarker));
        infoWindow.open(map, newMarker);
    });

    offices.push(newMarker);
    return newMarker;
}

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 54.904811288057225, lng: 23.95722029268427},
        zoom: 14,
        mapTypeControl: false
    });
    
    for (marker of markers) {
        createNewMarker(marker);
    }
    
    google.maps.event.addListener(map, 'click', onCursorClick);
    
    infoWindow = new google.maps.InfoWindow({
        content: ""
    });
}

function hideDueFilters(office) {
    let filters = {
        district: $('#filterDistrict').val(),
        priceMin: $('#filterPriceMin').val(),
        priceMax: $('#filterPriceMax').val(),
        areaMin: $('#filterAreaMin').val(),
        areaMax: $('#filterAreaMax').val(),
        workersMin: $('#filterWorkersMin').val(),
        workersMax: $('#filterWorkersMax').val(),
        heatingMin: $('#filterHeatingMin').val(),
        heatingMax: $('#filterHeatingMax').val()
    };
    
    var show = true;

    if (filters.district != '-' && office.districtId != filters.district) {
        show = false;
    }

    if (filters.priceMin != '-' && office.price < filters.priceMin) {
        show = false;
    }

    if (filters.priceMax != '-' && office.price > filters.priceMax) {
        show = false;
    }

    if (filters.areaMin != '-' && office.area < filters.areaMin) {
        show = false;
    }

    if (filters.areaMax != '-' && office.area > filters.areaMax) {
        show = false;
    }

    if (filters.workersMin != '-' && office.workers < filters.workersMin) {
        show = false;
    }

    if (filters.workersMax != '-' && office.workers > filters.workersMax) {
        show = false;
    }

    if (filters.heatingMin != '-' && office.heating < filters.heatingMin) {
        show = false;
    }

    if (filters.heatingMax != '-' && office.heating > filters.heatingMax) {
        show = false;
    }

    office.setMap(show ? map : null);
}

$('.collapse-sidebar').click(function () {
    let main = $(this).parent().parent();

    main.toggleClass('collapsed');

    let collapsed = main.hasClass('collapsed');
    Cookies.set('sidebarCollapsed', collapsed ? "true" : "false", {expires: 10});

    if (collapsed) {
        $(this).html('&raquo;');
    } else {
        $(this).html('&laquo;');
    }
});

$('#loginNavBtn').click(function (e) {
    e.preventDefault();
    e.stopPropagation();

    $('#loginModal').modal('show');
});

function bindButtons() {
    $('#createNewOfficeBtn').click(function (e) {
        e.preventDefault();
        e.stopPropagation();

        $('#newOfficeModal').modal('show');
    });
}

bindButtons();

$('#pointCoordinatesBtn').click(function (e) {
    e.preventDefault();
    e.stopPropagation();

    $('#map').addClass('pointing');
    pointing = true;
});

$('#updateFiltersBtn').click(function (e) {
    e.preventDefault();
    e.stopPropagation();
    
    let filters = {
        district: $('#filterDistrict').val(),
        priceMin: $('#filterPriceMin').val(),
        priceMax: $('#filterPriceMax').val(),
        areaMin: $('#filterAreaMin').val(),
        areaMax: $('#filterAreaMax').val(),
        workersMin: $('#filterWorkersMin').val(),
        workersMax: $('#filterWorkersMax').val(),
        heatingMin: $('#filterHeatingMin').val(),
        heatingMax: $('#filterHeatingMax').val()
    };
    
    var show;
    for (office of offices) {
        show = true;
        
        if (filters.district != '-' && office.districtId != filters.district) {
            show = false;
        }
        
        if (filters.priceMin != '-' && office.price < filters.priceMin) {
            show = false;
        }
        
        if (filters.priceMax != '-' && office.price > filters.priceMax) {
            show = false;
        }
        
        if (filters.areaMin != '-' && office.area < filters.areaMin) {
            show = false;
        }
        
        if (filters.areaMax != '-' && office.area > filters.areaMax) {
            show = false;
        }
        
        if (filters.workersMin != '-' && office.workers < filters.workersMin) {
            show = false;
        }
        
        if (filters.workersMax != '-' && office.workers > filters.workersMax) {
            show = false;
        }
        
        if (filters.heatingMin != '-' && office.heating < filters.heatingMin) {
            show = false;
        }
        
        if (filters.heatingMax != '-' && office.heating > filters.heatingMax) {
            show = false;
        }
        
        office.setMap(show ? map : null);
    }
});

$('#resetFiltersBtn').click(function (e) {
    e.preventDefault();
    e.stopPropagation();
    
    for (office of offices) {
        office.setMap(map);
    }
});

$('#loginForm').submit(function (e) {
    e.preventDefault();

    let $this = $(this);
    let url = $this.attr('action');
    let data = $this.serialize();

    // Call ajax to login
    $.post(url, data,
            function () {
                window.location.reload();
            }
    ).fail(function (response) {
        let json = response.responseJSON;

        if (json && json.errors) {
            $('#loginForm input').removeClass('is-invalid');

            $.each(json.errors, function (key, value) {
                $('#loginForm input[name="' + key + '"]').addClass('is-invalid');
                $('#loginForm input[name="' + key + '"] + .invalid-feedback strong').text(value[0]);
            })
        }
    });
});

$('#newOfficeForm').submit(function (e) {
    e.preventDefault();

    let $this = $(this);
    let url = $this.attr('action');
    let data = $this.serializeArray();
    var json = {};
    
    data.push({ name: "lat", value: $('#lat').val() });
    data.push({name: "lng", value: $('#lng').val() });
    
    $.each(data, function (key, el) {
        json[el.name] = el.value;
    });
    
    json.lat = Number(json.lat);
    json.lng = Number(json.lng);
    
    // Call ajax to login
    $.post(url, data,
        function (data) {
            $('#offices').replaceWith(data);
            $('#offices').addClass("show");
            $('#offices').addClass("active");
            
            hideDueFilters(createNewMarker(json));
            bindButtons();
            
            $('#newOfficeModal').modal('hide');
            $('#newOfficeForm input').removeClass('is-invalid').val('');
        }
    ).fail(function (response) {
        let json = response.responseJSON;

        if (json && json.errors) {
            $('#newOfficeForm input').removeClass('is-invalid');

            $.each(json.errors, function (key, value) {
                $('#newOfficeForm input[name="' + key + '"]').addClass('is-invalid');
                $('#newOfficeForm input[name="' + key + '"] + .invalid-feedback strong').text(value[0]);
            });
        }
    });
});
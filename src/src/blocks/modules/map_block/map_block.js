const MapBlock = class MapBlock {
    constructor() {
        this.map = null;
        this.placemark = null;
    }
    initMap() {
        ymaps.ready(() => {
            this.map = new ymaps.Map('map', {
                center: [52.279914, 104.311293],
                zoom: 16,
                controls: ['zoomControl', 'fullscreenControl',"geolocationControl"]
            }, {
                searchControlProvider: 'yandex#search'
            });
            this.placemark = new ymaps.Placemark([52.279914, 104.311293], {
                hintContent: 'Shumoff',
                balloonContent: 'Shumoff'
            });
            this.map.geoObjects
            .add(this.placemark)
        });
    }
    init() {
        if (!document.getElementById('map')) return;
        this.initMap();
    }
}

export default MapBlock;
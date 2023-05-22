new SlimSelect({
    select: "#location",
    settings: {
        placeholderText: "Любое местоположение",
        searchPlaceholder: "Поиск...",
        contentPosition: 'relative',
        contentLocation: document.querySelector('.location_local')
    }
})
new SlimSelect({
    select: "#type",
    settings: {
        placeholderText: "Любой тип",
        searchPlaceholder: "Поиск...",
        contentPosition: 'relative',
        contentLocation: document.querySelector('.type_local')
    }
})
new SlimSelect({
    select: "#id",
    settings: {
        placeholderText: "Любой ID",
        searchPlaceholder: "Поиск...",
        contentPosition: 'relative',
        contentLocation: document.querySelector('.id_local')
    }
})
new SlimSelect({
    select: "#city",
    settings: {
        searchPlaceholder: "Поиск...",
        contentPosition: 'relative',
        contentLocation: document.querySelector('.city_local')
    }
})
new SlimSelect({
    select: "#rooms-number",
    settings: {
        searchPlaceholder: "Поиск...",
        contentPosition: 'relative',
        contentLocation: document.querySelector('.rooms_local')
    }
})
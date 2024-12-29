.loader {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(5px);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 10;
    transition: opacity 0.3s ease;
}

.loader.hidden {
    opacity: 0;
    pointer-events: none;
}

.card-body {
    opacity: 0;
    transition: opacity 0.5s ease;
}

.card-body.loaded {
    opacity: 1;
}

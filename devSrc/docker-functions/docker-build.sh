#!/usr/bin/env bash

function docker-build-help() {
    printf "(Build the Docker images for this project)";
}

function docker-build() {
    set -e;

    # Save the directory we started in
    ORIGINAL_DIR=${PWD};

    WORK_DIR="$(cd "$(dirname "$0")" >/dev/null 2>&1 && pwd)";

    # CD into the work dir
    cd "${WORK_DIR}";

    # Run the app build
    printf "Building ghcr.io/buzzingpixel/docker-blue-ocean-demo-php-app\n";
    docker build \
        --build-arg BUILDKIT_INLINE_CACHE=1 \
        --cache-from ghcr.io/buzzingpixel/docker-blue-ocean-demo-php-app \
        --file docker/application/Dockerfile \
        --tag ghcr.io/buzzingpixel/docker-blue-ocean-demo-php-app \
        "${WORK_DIR}";
    printf "Finished building ghcr.io/buzzingpixel/docker-blue-ocean-demo-php-app\n\n";

    # Run the db build
    printf "Building ghcr.io/buzzingpixel/docker-blue-ocean-demo-php-db\n";
    docker build \
        --build-arg BUILDKIT_INLINE_CACHE=1 \
        --cache-from ghcr.io/buzzingpixel/docker-blue-ocean-demo-php-db \
        --file docker/db/Dockerfile \
        --tag ghcr.io/buzzingpixel/docker-blue-ocean-demo-php-db \
        "${WORK_DIR}";
    printf "Finished building ghcr.io/buzzingpixel/docker-blue-ocean-demo-php-db\n\n";

    # CD Back to original directory
    cd "${ORIGINAL_DIR}";

    return 0;
}

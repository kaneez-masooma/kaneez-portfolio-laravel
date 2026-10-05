/* ==========================================================================
   PREMIUM FEMININE-TECH HERO 3D
   Large 3D orbit/globe BEHIND the portrait
   ========================================================================== */

function supportsWebGL() {
    try {
        const canvas = document.createElement('canvas');

        return !!(
            window.WebGLRenderingContext &&
            (
                canvas.getContext('webgl') ||
                canvas.getContext('experimental-webgl')
            )
        );
    } catch (e) {
        return false;
    }
}


async function initHero3D() {

    const container = document.getElementById('hero-3d-canvas');

    if (!container) return;

    if (!supportsWebGL()) {
        return;
    }

    const THREE = await import('three');


    /* -----------------------------------------------------------------------
       SIZE
       ----------------------------------------------------------------------- */

    const getSize = () => ({
        width: Math.max(container.clientWidth, 1),
        height: Math.max(container.clientHeight, 1)
    });

    const { width, height } = getSize();


    /* -----------------------------------------------------------------------
       SCENE
       ----------------------------------------------------------------------- */

    const scene = new THREE.Scene();


    /* -----------------------------------------------------------------------
       CAMERA
       ----------------------------------------------------------------------- */

    const camera = new THREE.PerspectiveCamera(
        42,
        width / height,
        0.1,
        100
    );

    camera.position.set(0, 0, 6.5);


    /* -----------------------------------------------------------------------
       RENDERER
       ----------------------------------------------------------------------- */

    const renderer = new THREE.WebGLRenderer({
        alpha: true,
        antialias: true
    });

    renderer.setPixelRatio(
        Math.min(window.devicePixelRatio, 2)
    );

    renderer.setSize(width, height);

    renderer.setClearColor(0x000000, 0);

    container.appendChild(renderer.domElement);


    /* -----------------------------------------------------------------------
       MAIN 3D GROUP

       IMPORTANT:
       Larger than before so the orbit surrounds the portrait.
       ----------------------------------------------------------------------- */

    const group = new THREE.Group();

    group.position.set(
        0.25,
        0,
        -0.3
    );

    group.scale.set(
        1.25,
        1.25,
        1.25
    );

    scene.add(group);


    /* -----------------------------------------------------------------------
       LARGE WIREFRAME GLOBE
       ----------------------------------------------------------------------- */

    const globeGeometry =
        new THREE.IcosahedronGeometry(
            1.55,
            2
        );

    const globeWireframe =
        new THREE.WireframeGeometry(
            globeGeometry
        );

    const globeMaterial =
        new THREE.LineBasicMaterial({
            color: 0xe8a0bf,
            transparent: true,
            opacity: 0.26
        });

    const globe =
        new THREE.LineSegments(
            globeWireframe,
            globeMaterial
        );

    group.add(globe);


    /* -----------------------------------------------------------------------
       INNER GLOBE / TECH CORE
       ----------------------------------------------------------------------- */

    const coreGeometry =
        new THREE.IcosahedronGeometry(
            0.95,
            1
        );

    const coreWireframe =
        new THREE.WireframeGeometry(
            coreGeometry
        );

    const coreMaterial =
        new THREE.LineBasicMaterial({
            color: 0xb9a7e8,
            transparent: true,
            opacity: 0.14
        });

    const core =
        new THREE.LineSegments(
            coreWireframe,
            coreMaterial
        );

    group.add(core);


    /* -----------------------------------------------------------------------
       LARGE PINK ORBIT
       ----------------------------------------------------------------------- */

    const pinkOrbit =
        new THREE.Mesh(
            new THREE.TorusGeometry(
                2.05,
                0.014,
                8,
                160
            ),

            new THREE.MeshBasicMaterial({
                color: 0xe8a0bf,
                transparent: true,
                opacity: 0.70,
                side: THREE.DoubleSide
            })
        );

    pinkOrbit.rotation.x =
        Math.PI / 2.7;

    pinkOrbit.rotation.z =
        0.25;

    group.add(pinkOrbit);


    /* -----------------------------------------------------------------------
       LARGE LAVENDER ORBIT
       ----------------------------------------------------------------------- */

    const lavenderOrbit =
        new THREE.Mesh(
            new THREE.TorusGeometry(
                2.25,
                0.011,
                8,
                160
            ),

            new THREE.MeshBasicMaterial({
                color: 0xb9a7e8,
                transparent: true,
                opacity: 0.55,
                side: THREE.DoubleSide
            })
        );

    lavenderOrbit.rotation.x =
        -Math.PI / 3;

    lavenderOrbit.rotation.y =
        0.45;

    group.add(lavenderOrbit);


    /* -----------------------------------------------------------------------
       THIRD SUBTLE ORBIT
       ----------------------------------------------------------------------- */

    const softOrbit =
        new THREE.Mesh(
            new THREE.TorusGeometry(
                1.82,
                0.007,
                8,
                160
            ),

            new THREE.MeshBasicMaterial({
                color: 0xf3c6d8,
                transparent: true,
                opacity: 0.28,
                side: THREE.DoubleSide
            })
        );

    softOrbit.rotation.x =
        Math.PI / 3.2;

    softOrbit.rotation.y =
        -0.35;

    group.add(softOrbit);


    /* -----------------------------------------------------------------------
       FLOATING NODES
       ----------------------------------------------------------------------- */

    const nodeGeometry =
        new THREE.SphereGeometry(
            0.065,
            14,
            14
        );

    const pinkNodeMaterial =
        new THREE.MeshBasicMaterial({
            color: 0xe8a0bf
        });

    const lavenderNodeMaterial =
        new THREE.MeshBasicMaterial({
            color: 0xb9a7e8
        });


    const nodePositions = [

        [-2.15, 0.85, 0],

        [2.15, 1.05, -0.1],

        [-2.0, -1.15, 0.1],

        [2.05, -1.0, 0.2],

        [0.25, 2.15, -0.1],

        [-0.25, -2.15, 0.1]

    ];


    nodePositions.forEach(
        (position, index) => {

            const node =
                new THREE.Mesh(
                    nodeGeometry,
                    index % 2 === 0
                        ? pinkNodeMaterial
                        : lavenderNodeMaterial
                );

            node.position.set(
                position[0],
                position[1],
                position[2]
            );

            group.add(node);
        }
    );


    /* -----------------------------------------------------------------------
       SUBTLE PARTICLES
       ----------------------------------------------------------------------- */

    const particleCount = 90;

    const positions =
        new Float32Array(
            particleCount * 3
        );


    for (
        let i = 0;
        i < particleCount;
        i++
    ) {

        const angle =
            Math.random() *
            Math.PI *
            2;

        const radius =
            2.5 +
            Math.random() * 1.6;

        positions[i * 3] =
            Math.cos(angle) * radius;

        positions[i * 3 + 1] =
            (Math.random() - 0.5) * 4.2;

        positions[i * 3 + 2] =
            (Math.random() - 0.5) * 2.5;
    }


    const particleGeometry =
        new THREE.BufferGeometry();

    particleGeometry.setAttribute(
        'position',
        new THREE.BufferAttribute(
            positions,
            3
        )
    );


    const particleMaterial =
        new THREE.PointsMaterial({
            color: 0xe8a0bf,
            size: 0.025,
            transparent: true,
            opacity: 0.48
        });


    const particles =
        new THREE.Points(
            particleGeometry,
            particleMaterial
        );

    scene.add(particles);


    /* -----------------------------------------------------------------------
       MOUSE MOVEMENT
       ----------------------------------------------------------------------- */

    let mouseX = 0;
    let mouseY = 0;


    container.addEventListener(
        'mousemove',
        (event) => {

            const rect =
                container.getBoundingClientRect();

            mouseX =
                (event.clientX - rect.left) /
                rect.width -
                0.5;

            mouseY =
                (event.clientY - rect.top) /
                rect.height -
                0.5;
        }
    );


    container.addEventListener(
        'mouseleave',
        () => {

            mouseX = 0;
            mouseY = 0;
        }
    );


    /* -----------------------------------------------------------------------
       ANIMATION
       ----------------------------------------------------------------------- */

    function animate() {

        requestAnimationFrame(
            animate
        );


        globe.rotation.x += 0.0007;
        globe.rotation.y += 0.0015;


        core.rotation.x -= 0.0006;
        core.rotation.y -= 0.0012;


        pinkOrbit.rotation.y += 0.0016;
        pinkOrbit.rotation.z += 0.0004;


        lavenderOrbit.rotation.x -= 0.0006;
        lavenderOrbit.rotation.z += 0.0005;


        softOrbit.rotation.y += 0.0008;


        particles.rotation.y += 0.0002;


        /* Gentle mouse interaction */

        group.rotation.y +=
            (
                mouseX * 0.10 -
                group.rotation.y
            ) * 0.025;


        group.rotation.x +=
            (
                -mouseY * 0.07 -
                group.rotation.x
            ) * 0.025;


        renderer.render(
            scene,
            camera
        );
    }


    animate();


    /* -----------------------------------------------------------------------
       RESPONSIVE
       ----------------------------------------------------------------------- */

    window.addEventListener(
        'resize',
        () => {

            const size =
                getSize();

            camera.aspect =
                size.width /
                size.height;

            camera.updateProjectionMatrix();

            renderer.setSize(
                size.width,
                size.height
            );
        }
    );
}


document.addEventListener(
    'DOMContentLoaded',
    initHero3D
);
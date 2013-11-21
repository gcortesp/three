<!DOCTYPE html>
<html lang="en">
	<head>
		<title>three.js webgl - loaders - OBJ loader</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
		<link rel='stylesheet' type='text/css' href='main.css' />
		<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,300' rel='stylesheet' type='text/css'>

	</head>
	<body>
		<div class="site-container"></div>
		<div class="header">
			<div  class="top-bar">
				<ul>
					<li>HU&Eacute;RFANOS 1044 OFICINA 92, SANTIAGO, CHILE</li>
					<li>CONTACTO@SOCIALFACTORY.CL</li>
				</ul>
				<div class="soc-ico">
					<a title="Facebook" target="_blank" href="/" class="facebook">
						<span class="assistive-text">Facebook</span>
					</a>
					<a title="Twitter" target="_blank" href="/" class="twitter">
						<span class="assistive-text">Twitter</span>
					</a>
					<a title="Pinterest" target="_blank" href="/" class="pinterest">
						<span class="assistive-text">Pinterest</span>
					</a>
					<a title="Instagram" target="_blank" href="/" class="instagram">
						<span class="assistive-text">Instagram</span>
					</a>
				</div>
			</div>
		</div>
		<div class="top-bar-op"></div>
		<script src="three.min.js"></script>
		<script src="loader.js"></script>

		<script src="Detector.js"></script>
		<script src="stats.js"></script>

		<script>

			var container, stats;

			var camera, scene, renderer;

			var mouseX = 0, mouseY = 0;

			var windowHalfX = window.innerWidth / 2;
			var windowHalfY = window.innerHeight / 2;


			init();
			animate();


			function init() {

				container = document.createElement( 'div' );
				document.body.appendChild( container );
				
				scene = new THREE.Scene();
				//camera = new THREE.OrthographicCamera( window.innerWidth / -10, window.innerWidth / 10, window.innerHeight / 10, window.innerHeight / - 10, 10, 2000 );
				camera = new THREE.PerspectiveCamera( 45, window.innerWidth / window.innerHeight , .05, 2000 );
				camera.position.z = 210;

				//var ambient = new THREE.AmbientLight( 0x101030 );
				//scene.add( ambient );

				var directionalLight = new THREE.DirectionalLight( 0xffeedd );
				directionalLight.position.set( 0, 0, 1 );
				scene.add( directionalLight );

				// texture

				var manager = new THREE.LoadingManager();
				manager.onProgress = function ( item, loaded, total ) {

					console.log( item, loaded, total );

				};

				var texture = new THREE.Texture();
				
				
				
				var img = new Image();
				
				var texture = new THREE.Texture(img);
				img.onload = function () { texture.needsUpdate = true; };
				img.src = 'slide-03.jpg';
				texture.needsUpdate = true;
				
				var texture = new THREE.Texture(img);
				var head_material = new THREE.MeshPhongMaterial({map: texture});
				var head_geometry = new THREE.PlaneGeometry(480,280);
				var head = new THREE.Mesh(head_geometry, head_material);
				head.position.y = (1 + 5) * .2;
				//head.position.x = (10 + 35) * .8;
				scene.add(head)
				
				renderer = new THREE.WebGLRenderer();
				renderer.setSize( window.innerWidth, window.innerHeight );
				container.appendChild( renderer.domElement );

				document.addEventListener( 'mousemove', onDocumentMouseMove, false );

				window.addEventListener( 'resize', onWindowResize, false );

			}

			function onWindowResize() {

				windowHalfX = window.innerWidth / 1;
				windowHalfY = window.innerHeight / 1;

				camera.aspect = window.innerWidth / window.innerHeight;
				camera.updateProjectionMatrix();

				renderer.setSize( window.innerWidth, window.innerHeight );

			}

			function onDocumentMouseMove( event ) {

				mouseX = ( event.clientX - windowHalfX ) / 10;
				mouseY = ( event.clientY - windowHalfY ) / 10;

			}

			function animate() {

				requestAnimationFrame( animate );
				render();

			}
			
			function render() {

				camera.position.x += ( mouseX - camera.position.x ) * .05;
				camera.position.y += ( - mouseY - camera.position.y ) * .05;
				
				//camera.lookAt( scene );

				renderer.render( scene, camera );

			}

		</script>
		

	</body>
</html>
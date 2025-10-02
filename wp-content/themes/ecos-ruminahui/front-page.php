<?php
get_header();
?>
<section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">
        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
            <div class="col-xl-6 col-lg-8">
                <h1>¡Somos la energía de la gente!</h1>
                <h2>En Rumiñahui FM encuentras todo lo que te apasiona</h2>
            </div>
        </div>

        <div class="row gy-4 mt-5 justify-content-center" data-aos="zoom-in" data-aos-delay="250">
            <div class="col-xl-2 col-md-4">
                <div class="icon-box">
                    <i class="ri-news-line"></i>
                    <h3><a href="#noticias">Noticias</a></h3>
                </div>
            </div>
            <div class="col-xl-2 col-md-4">
                <div class="icon-box">
                    <i class="ri-surround-sound-line"></i>
                    <h3><a href="#entretenimiento">Diversión</a></h3>
                </div>
            </div>
            <div class="col-xl-2 col-md-4">
                <div class="icon-box">
                    <i class="ri-football-line"></i>
                    <h3><a href="#deportes">Deportes</a></h3>
                </div>
            </div>
            <div class="col-xl-2 col-md-4">
                <div class="icon-box">
                    <i class="ri-headphone-line"></i>
                    <h3><a href="#musica">Música</a></h3>
                </div>
            </div>
        </div>
    </div>
</section>
<section style="background-color: #333; padding: 20px;">
    <div style="display: flex; justify-content: space-around; align-items: center; flex-wrap: wrap;">
        <div style="flex: 1 1 15%;"></div>
        <div style="flex: 1 1 15%;"></div>
        <div style="flex: 1 1 40%; display: flex; justify-content: center; align-items: center; gap: 10px;">
            <div style="width: auto; height: 40px;">
                <audio id="audioPlayer" controls preload="none" style="height: 40px;">
                    <source src="https://streamingecuador.com:9040/stream" type="audio/mp3">
                    <?php esc_html_e( 'Tu navegador no soporta el reproductor de audio.', 'ecos-ruminahui' ); ?>
                </audio>
            </div>
            <div>
                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/en-vivo.png' ); ?>" alt="En Vivo" style="width: 100px;">
            </div>
        </div>
        <div style="flex: 1 1 15%;"></div>
        <div style="flex: 1 1 15%;"></div>
    </div>
</section>
<main id="main">
    <section id="about" class="about section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">
                <div class="col-lg-6 order-1 order-lg-2">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/radio2024.jpg' ); ?>" class="img-fluid" alt="Radio Ecos de Rumiñahui">
                </div>
                <div class="col-lg-6 order-2 order-lg-1 content">
                    <h3>Radio Ecos de Rumiñahui</h3>
                    <p class="fst-italic">
                        La Radio Pública Municipal "Ecos de Rumiñahui" forma parte de la Empresa Pública Municipal de Residuos Sólidos Rumiñahui-Aseo, EPM. Inició formalmente sus emisiones el 15 de enero de 2014, como un medio radial público, a través del dial 88.9 FM y, desde entonces, ha desempeñado un papel crucial en la comunidad, informando, educando y entreteniendo a los residentes de Rumiñahui y zonas aledañas.
                    </p>
                    <ul>
                        <li><i class="bi bi-check2-all"></i> <span>Administrar y formalizar los diferentes procesos de la emisora.</span></li>
                        <li><i class="bi bi-check2-all"></i> <span>Desarrollar y formalizar la programación de la radio.</span></li>
                        <li><i class="bi bi-check2-all"></i> <span>Establecer el trabajo de toda la emisora y la participación de colaboradores externos.</span></li>
                        <li><i class="bi bi-check2-all"></i> <span>Gestionar y desarrollar las relaciones comunicacionales, comerciales de la emisora con organismos y personas externos a ella.</span></li>
                        <li><i class="bi bi-check2-all"></i> <span>Desarrollar y ejecutar emisiones informativas y producciones.</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section id="programacion" class="has_eae_slider elementor-section elementor-top-section elementor-section-boxed">
        <style>
            #programacion {
                background-color: #2b2b2b;
                color: #ffffff;
                padding: 20px;
            }

            #programacion h1 {
                color: #00bcd4;
                text-align: center;
                font-size: 2rem;
                margin-bottom: 20px;
            }

            #programacion p {
                text-align: center;
                margin-bottom: 30px;
            }

            #programacion table {
                width: 100%;
                border-collapse: collapse;
            }

            #programacion th,
            #programacion td {
                border-bottom: 1px solid #444444;
                padding: 15px;
                text-align: center;
            }

            #programacion th {
                color: #00bcd4;
            }

            #programacion td i {
                font-size: 1.5rem;
                color: #00bcd4;
            }

            #programacion tr:hover {
                background-color: #444444;
            }

            #programacion td:last-child i {
                font-size: 1.2rem;
                color: #00bcd4;
            }
        </style>
        <div class="elementor-container elementor-column-gap-default">
            <h1 class="elementor-heading-title elementor-size-large">NUESTRA PROGRAMACIÓN</h1>
            <p>¡Te acompañamos desde la media noche con una parrilla de programación pensada para ti!</p>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Programa</th>
                        <th>Conductor/es</th>
                        <th>Días</th>
                        <th>Horario</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><i class="fas fa-sun"></i></td>
                        <td>Música variada</td>
                        <td>Programado</td>
                        <td>Lunes a viernes</td>
                        <td>De 00:00 a 03:00</td>
                        <td><i class="fas fa-volume-up"></i></td>
                    </tr>
                    <tr>
                        <td><i class="fas fa-icons"></i></td>
                        <td>Música Popular Mix</td>
                        <td>Programado</td>
                        <td>Lunes a viernes</td>
                        <td>De 03:00 a 05:00</td>
                        <td><i class="fas fa-volume-up"></i></td>
                    </tr>
                    <tr>
                        <td><i class="fas fa-guitar"></i></td>
                        <td>Levántate Rumiñahui</td>
                        <td>Eduardo Guayta</td>
                        <td>Lunes a viernes</td>
                        <td>De 05:00 a 07:00</td>
                        <td><i class="fas fa-volume-up"></i></td>
                    </tr>
                    <tr>
                        <td><i class="fas fa-music"></i></td>
                        <td>Noticiero En Voz Alta<br>(Primera emisión)</td>
                        <td>Jaime Rosero, Manolo Escobar</td>
                        <td>Lunes a viernes</td>
                        <td>De 07:00 a 08:30</td>
                        <td><i class="fas fa-volume-up"></i></td>
                    </tr>
                    <tr>
                        <td><i class="fas fa-filter"></i></td>
                        <td>Sin Filtros</td>
                        <td>Karina Agila</td>
                        <td>Lunes a viernes</td>
                        <td>De 08:30 a 10:00</td>
                        <td><i class="fas fa-volume-up"></i></td>
                    </tr>
                    <tr>
                        <td><i class="fas fa-futbol"></i></td>
                        <td>Enlace Deportivo</td>
                        <td>Cristina Chilig</td>
                        <td>Lunes a viernes</td>
                        <td>De 10:00 a 11:30</td>
                        <td><i class="fas fa-volume-up"></i></td>
                    </tr>
                    <tr>
                        <td><i class="fas fa-search"></i></td>
                        <td>Sonoridades</td>
                        <td>Estefanía Apolo</td>
                        <td>Miércoles</td>
                        <td>De 11:30 a 12:30</td>
                        <td><i class="fas fa-volume-up"></i></td>
                    </tr>
                    <tr>
                        <td><i class="fas fa-recycle"></i></td>
                        <td>Hablemos de Residuos</td>
                        <td>Ramón Bravo</td>
                        <td>Jueves</td>
                        <td>De 11:30 a 12:30</td>
                        <td><i class="fas fa-volume-up"></i></td>
                    </tr>
                    <tr>
                        <td><i class="fas fa-music"></i></td>
                        <td>Noticiero En Voz Alta<br>(Segunda emisión)</td>
                        <td>Jaime Rosero</td>
                        <td>Lunes a viernes</td>
                        <td>De 12:30 a 13:00</td>
                        <td><i class="fas fa-volume-up"></i></td>
                    </tr>
                    <tr>
                        <td><i class="fas fa-globe-americas"></i></td>
                        <td>Sonidos y canciones de Latinoamérica</td>
                        <td>Programado</td>
                        <td>Lunes a viernes</td>
                        <td>De 13:00 a 14:00</td>
                        <td><i class="fas fa-volume-up"></i></td>
                    </tr>
                    <tr>
                        <td><i class="fas fa-globe-americas"></i></td>
                        <td>Suenan las Orquestas</td>
                        <td>Programado</td>
                        <td>Lunes a viernes</td>
                        <td>De 14:00 a 15:00</td>
                        <td><i class="fas fa-volume-up"></i></td>
                    </tr>
                    <tr>
                        <td><i class="fas fa-play"></i></td>
                        <td>Cantos de mi Tierra</td>
                        <td>Manolo Escobar</td>
                        <td>Lunes a viernes</td>
                        <td>De 15:00 a 17:30</td>
                        <td><i class="fas fa-volume-up"></i></td>
                    </tr>
                    <tr>
                        <td><i class="fas fa-futbol"></i></td>
                        <td>Noticiero En Voz Alta<br>(Tercera emisión)</td>
                        <td>Ramón Bravo</td>
                        <td>Lunes a viernes</td>
                        <td>De 17:30 a 18:00</td>
                        <td><i class="fas fa-volume-up"></i></td>
                    </tr>
                    <tr>
                        <td><i class="fas fa-globe-americas"></i></td>
                        <td>A casa con salsa</td>
                        <td>Programado</td>
                        <td>Lunes a viernes</td>
                        <td>De 18:00 a 19:00</td>
                        <td><i class="fas fa-volume-up"></i></td>
                    </tr>
                    <tr>
                        <td><i class="fas fa-globe-americas"></i></td>
                        <td>Música para jóvenes... del ayer</td>
                        <td>Programado</td>
                        <td>Lunes a viernes</td>
                        <td>De 19:00 a 21:00</td>
                        <td><i class="fas fa-volume-up"></i></td>
                    </tr>
                    <tr>
                        <td><i class="fas fa-music"></i></td>
                        <td>Mix música popular</td>
                        <td>Programado</td>
                        <td>Lunes a viernes</td>
                        <td>De 21:00 a 23:00</td>
                        <td><i class="fas fa-volume-up"></i></td>
                    </tr>
                    <tr>
                        <td><i class="fas fa-compact-disc"></i></td>
                        <td>Música variada</td>
                        <td>Programado</td>
                        <td>Lunes a viernes</td>
                        <td>De 23:00 a 24:00</td>
                        <td><i class="fas fa-volume-up"></i></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Contacto</h2>
                <p>Contáctate con nosotros</p>
            </div>
            <div>
                <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.745680685864!2d-78.45765048945674!3d-0.34573919964940625!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d5bcc1a0f604ef%3A0xd5901b71f2157124!2sRumi%C3%B1ahui-Aseo%20EPM!5e0!3m2!1ses-419!2sec!4v1710520874560!5m2!1ses-419!2sec" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="row mt-5">
                <div class="col-lg-4">
                    <div class="info">
                        <div class="address">
                            <i class="bi bi-geo-alt"></i>
                            <h4>Dirección:</h4>
                            <p>Av. General Enríquez s/n vía a Cotogchoa, Sangolquí 170501</p>
                        </div>
                        <div class="email">
                            <i class="bi bi-envelope"></i>
                            <h4>Email:</h4>
                            <p>programacion_radio@epmr.gob.ec</p>
                        </div>
                        <div class="phone">
                            <i class="bi bi-phone"></i>
                            <h4>Llámanos:</h4>
                            <p>02 233 5516</p>
                            <h4>WhatsApp:</h4>
                            <p>098 4090 463</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 mt-5 mt-lg-0">
                    <?php
                    $contact_status = isset( $_GET['contact_status'] ) ? sanitize_text_field( wp_unslash( $_GET['contact_status'] ) ) : '';
                    ?>
                    <form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" class="php-email-form">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Nombre" required>
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Asunto" required>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="message" rows="5" placeholder="Mensaje" required></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading" style="display:none;">Loading</div>
                            <?php if ( 'error' === $contact_status ) : ?>
                                <div class="error-message" style="display:block;">Ocurrió un problema al enviar el mensaje. Inténtalo nuevamente.</div>
                            <?php else : ?>
                                <div class="error-message"></div>
                            <?php endif; ?>
                            <div class="sent-message" style="<?php echo ( 'success' === $contact_status ) ? 'display:block;' : ''; ?>">¡Gracias! Su mensaje ha sido enviado.</div>
                        </div>
                        <?php wp_nonce_field( 'ecos_contact_form', 'ecos_contact_nonce' ); ?>
                        <input type="hidden" name="action" value="ecos_ruminahui_contact">
                        <div class="text-center"><button type="submit">Enviar mensaje</button></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
<footer id="footer" style="background-color: #00103e;">
    <div class="container">
        <div class="copyright">
            &copy; <strong><span>Radio Ecos de Rumiñahui</span></strong>. Todos los derechos reservados
        </div>
    </div>
</footer>
<?php get_footer(); ?>

    <?php 
        foreach ($services as $serv): 
        $dateOfBirth = $serv['patient']['birthdate'];
        $today = date("Y-m-d");
        $diff = date_diff(date_create($dateOfBirth), date_create($today));
        $age = $diff->format('%y');
    ?>


    <main class="main__content">
        <div class="service-card">        
            <section class="content__nurse--header">
            <div>
                <h1><?php echo ($serv['patient']['name']); ?></h1>
                <button
                    id="buttonShowInfo_<?php echo $serv['id']; ?>"
                    class="button button--transparent"
                    onclick="showInfoNurse(<?php echo $serv['id']; ?>)"
                >
                    <i class="fa-solid fa-angle-down"></i> 
                </button>
            </div>
            <h2><?php echo explode(" ",$serv['date'])[0]; ?> | <?php echo $serv['schedule']; ?> (<?php echo $serv['duration']; ?>)</h2>
            </section>
    
            <section class="content__nurse--body infoNurse" id="infoNurse_<?php echo $serv['id']; ?>">
            <!-- Dirección del paciente -->
            <div>
                <i class="fa-solid fa-location-dot"></i>
                Río Lerma 27, Dept 5, Col Cuauhtémoc, 06500, CDMX, México
                <a
                    class="button button--primary"
                    href="https://www.google.com.mx/maps/@19.3428385,-99.0472933,16.96z"
                >
                    Ver en mapa
                </a>
            </div>

            <!-- Datos del paciente -->
            <div class="nurse__body--datos">
                <h2>Datos del paciente</h2>
                <ul>
                    <li><?php echo $serv['patient']['gender']==1?"Mujer":"Hombre"; ?></li>
                    <li><?php echo $serv['patient']['weight']; ?>Kg</li>
                    <li><?php echo $age; ?> años</li>
                    <li><?php echo $serv['patient']['height']; ?> cm</li>
                </ul>
            </div>

            <!-- Padecimientos del paciente -->
            <div class="nurse__body--padecimientos">
                <h2>Padecimientos</h2>
                <ul>
                    <?php foreach ($serv['patient']['ailments'] as $ail): ?>
                        <li><?php echo $ail['name']; ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
            
            <!-- Información adicional del paciente -->
            <div class="nurse__body--adicional">
                <h2>Información adicional</h2>
                <ul>
                    <li>plan de cuidados</li>
                    <li>bitácora</li>
                </ul>
            </div>
            </section>
            <section class="content__nurse--button">
            <button class="button button--primary" id="buttonEnCamino_<?php echo $serv['id']; ?>" onclick="handleButtonEnCamino(<?php echo $serv['id']; ?>)">
                Reportar en camino
                <i class="fa-solid fa-clock"></i>
            </button>
            </section>
        </div>
    </main>
    <?php endforeach ?>


<script>
    let stateEnCamino = [];
    const handleButtonEnCamino = (id) => {
        if (!stateEnCamino[id]) stateEnCamino[id] = 'none';
        const buttonEnCamino = document.getElementById('buttonEnCamino_'+id);
        if (stateEnCamino[id] === 'none') {
            const span = document.createElement('span');
            buttonEnCamino.innerHTML = '';
            timer(span,id,buttonEnCamino);
            buttonEnCamino.appendChild(span);
            buttonEnCamino.classList.add('button--danger');
            stateEnCamino[id] = 'cancelable';
        } else {
            if (stateEnCamino[id] === 'cancelable') {
                stateEnCamino[id] = 'cancelado';
            }
        }
        if (stateEnCamino[id] === 'enCaminoReportado') {
            window.location.replace('<?php echo __ROOT__; ?>/enfermera/servicios');
        }
    }
    function timer(element,id,buttonEnCamino) {
        let timeleft = 9;
        element.innerHTML = 'Cancelar 00:10';
        let downloadTimer = setInterval(function(){
            if(timeleft <= 0){
                clearInterval(downloadTimer);
                element.innerHTML = `
                    En camino reportado
                    <i class="fa-solid fa-check"></i>
                `;
                stateEnCamino[id] = 'enCaminoReportado';
                buttonEnCamino.classList.remove('button--danger');
                setTimeout(function(){
                    buttonEnCamino.innerHTML = `
                        Iniciar servicio
                        <i class="fa-solid fa-clock"></i>
                    `;
                    buttonEnCamino.classList.add('button--primary');
                    stateEnCamino[id] = 'enCaminoReportado';
                }, 1500);
            } else {
                if (stateEnCamino[id] === 'cancelado') {
                    clearInterval(downloadTimer);
                    element.innerHTML = `Cancelado`;
                    buttonEnCamino.classList.remove('button--danger');
                    setTimeout(function(){
                        buttonEnCamino.innerHTML = `
                        Reportar en camino
                            <i class="fa-solid fa-clock"></i>
                        `;
                        buttonEnCamino.classList.add('button--primary');
                        stateEnCamino[id] = 'none';
                    }, 1500);
                }
                else {
                    element.innerHTML = ` Cancelar 00:0${timeleft}`;
                }
            }
            timeleft -= 1;
        }, 1000);
    }
</script>

<script> //Script para manejar el showInfo

    let showInfo = [];
    const showInfoNurse = (id) => {
        const infoNurse = document.getElementById('infoNurse_'+id);
        console.log(infoNurse)
        const iconButton = document.querySelector('#buttonShowInfo_'+id+' i');
        console.log('click');
        if (!showInfo[id]) {
            infoNurse.style.display = 'block';
            showInfo[id] = true;
            iconButton.classList.remove('fa-angle-down');
            iconButton.classList.add('fa-angle-up');
        } else {
            infoNurse.style.display = 'none';
            showInfo[id] = false;
            iconButton.classList.remove('fa-angle-up');
            iconButton.classList.add('fa-angle-down');
        }
    }
</script>
<main class="main__content">
    <section class="content__nurse--header">
        <div>
            <h1>Marta Suárez</h1>
            <button
                id="buttonShowInfo"
                class="button button--transparent"
                onclick="showInfoNurse()"
            >
                <i class="fa-solid fa-angle-down"></i> 
            </button>
        </div>
        <h2>12.06.2021 | 8:00 a 20:00 (12hrs)</h2>
    </section>

    <section class="content__nurse--body" id="infoNurse">
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
                <li>Mujer</li>
                <li>78 Kg</li>
                <li>70 años</li>
                <li>1.67 cm</li>
            </ul>
        </div>

        <!-- Padecimientos del paciente -->
        <div class="nurse__body--padecimientos">
            <h2>Padecimientos</h2>
            <ul>
                <li>Padecimiento 1</li>
                <li>Padecimiento 2</li>
                <li>Padecimiento 3</li>
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
        <button class="button button--primary" id="buttonEnCamino">
            Reportar en camino
            <i class="fa-solid fa-clock"></i>
        </button>
    </section>
</main>

<script>
    const buttonEnCamino = document.getElementById('buttonEnCamino');
    let stateEnCamino = 'none';
    const handleButtonEnCamino = () => {
        if (stateEnCamino === 'none') {
            const span = document.createElement('span');
            buttonEnCamino.innerHTML = '';
            timer(span);
            buttonEnCamino.appendChild(span);
            buttonEnCamino.classList.add('button--danger');
            stateEnCamino = 'cancelable';
        } else {
            if (stateEnCamino === 'cancelable') {
                stateEnCamino = 'cancelado';
            }
        }
        if (stateEnCamino === 'enCaminoReportado') {
            window.location.replace('servicios');
        }
    }
    function timer(element) {
        let timeleft = 9;
        element.innerHTML = 'Cancelar 00:10';
        let downloadTimer = setInterval(function(){
            if(timeleft <= 0){
                clearInterval(downloadTimer);
                element.innerHTML = `
                    En camino reportado
                    <i class="fa-solid fa-check"></i>
                `;
                stateEnCamino = 'enCaminoReportado';
                buttonEnCamino.classList.remove('button--danger');
                setTimeout(function(){
                    buttonEnCamino.innerHTML = `
                        Iniciar servicio
                        <i class="fa-solid fa-clock"></i>
                    `;
                    buttonEnCamino.classList.add('button--primary');
                    stateEnCamino = 'enCaminoReportado';
                }, 1500);
            } else {
                if (stateEnCamino === 'cancelado') {
                    clearInterval(downloadTimer);
                    element.innerHTML = `Cancelado`;
                    buttonEnCamino.classList.remove('button--danger');
                    setTimeout(function(){
                        buttonEnCamino.innerHTML = `
                        Reportar en camino
                            <i class="fa-solid fa-clock"></i>
                        `;
                        buttonEnCamino.classList.add('button--primary');
                        stateEnCamino = 'none';
                    }, 1500);
                }
                else {
                    element.innerHTML = ` Cancelar 00:0${timeleft}`;
                }
            }
            timeleft -= 1;
        }, 1000);
    }
    buttonEnCamino.addEventListener('click', handleButtonEnCamino);
</script>

<script> //Script para manejar el showInfo
    const infoNurse = document.getElementById('infoNurse');
    const iconButton = document.querySelector('#buttonShowInfo i');
    let showInfo = false;

    const showInfoNurse = () => {
        console.log('click');
        if (!showInfo) {
            infoNurse.style.display = 'block';
            showInfo = true;
            iconButton.classList.remove('fa-angle-down');
            iconButton.classList.add('fa-angle-up');
        } else {
            infoNurse.style.display = 'none';
            showInfo = false;
            iconButton.classList.remove('fa-angle-up');
            iconButton.classList.add('fa-angle-down');
        }
    }
</script>
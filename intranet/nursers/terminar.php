<div class="main__header--enfermera">
    <h1>Marta Suárez</h1>
    <h2>12.06.2021 | 8:00 a 20:00 (12hrs)</h2>
</div>
<main class="main__ingresos">

    <section class="ingresos__body">
        <form>
            <div class="form__field">
                <label for="notaDeEnfermeria">Nota de enfermería</label>
                <textarea name="notaDeEnfermeria" id="notaDeEnfermeria" cols="30" rows="10"></textarea>
            </div>
            <div class="form__field">
                <label for="riesgoDeCaida">Riesgo de caída (opcional)</label>
                <select name="riesgoDeCaida" id="riesgoDeCaida">
                    <option value="1">Otro</option>
                    <option value="2">Otro</option>
                </select>
            </div>
            <div class="form__field">
                <label for="valoracion">Valoración</label>
                <input type="text" name="valoracion" id="valoracion">
            </div>

            <div>
                <input type="submit" class="button button--primary button--submit" value="Confirmar">
            </div>
        </form>
    </section>
</main>
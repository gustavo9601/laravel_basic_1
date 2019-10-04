<div class="container">
    <div class="form">
        <form action="{{ url('/formularios')  }}" method="post">

            <div>
                <label for="name">Nombre de la fruta</label><br>
                <input type="text"  name="name" id="name" placeholder="Nombre de la fruta">
            </div>
            <div>
                <label for="description">Descripcion de la fruta</label><br>
                <textarea id="description" name="description" placeholder="Descripcion de la fruta">
                </textarea>
            </div>
            <div>
                <input type="submit" value="Enviar">
            </div>


        </form>
    </div>
</div>
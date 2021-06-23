        <p> Veuillez completer votre profil </p>
        <form action="members.php" method="POST">
        <div class="col-6 card">
            <h4> Pratiquez vous un sport ? si oui cochez vos differents sports?</h4>
            <div>
                <div>
                    <label for="choix-1"><input type="checkbox" id="choix-1" value="valeur-1">Athlétisme</label>
                </div>

                <div>
                    <label for="choix-2"><input type="checkbox" id="choix-2" value="valeur-2">Cyclisme</label>
                </div>

                <div>
                    <label for="choix-3"><input type="checkbox" id="choix-3" value="valeur-3">Sports de précision</label>
                </div>

                <div>
                    <label for="choix-4"><input type="checkbox" id="choix-4" value="valeur-4">Sports mécaniques</label>
                </div>
            </div>
            <h4> Parlez nous de votre personnalité</h4>
            <div>
                <div>
                    <label for="choix-2-1"><input type="checkbox" id="choix-2-1" value="valeur-2-1">Altruiste</label>
                </div>

                <div>
                    <label for="choix-2-2"><input type="checkbox" id="choix-2-2" value="valeur-2-2">Timide</label>
                </div>

                <div>
                    <label for="choix-3-2"><input type="checkbox" id="choix-3-2" value="valeur-3-2">intraverti</label>
                </div>

                <div>
                    <label for="choix-4-2"><input type="checkbox" id="choix-4-2" value="valeur-4-2">Extraverti</label>
                </div>
            </div>
            <h4> Avez vous un/des animaux de compagnie?</h4>
            <div>
                <input type="radio" id="oui" name="oui" value="Oui">
                <label for="oui">OUI</label>

                <input type="radio" id="non" name="oui" value="Non">
                <label for="non">NON</label>
            </div>
            <h4> Avez entré votre profil</h4>
            <input type="file" name="image" />
            <input type="submit" value="Envoyer" name="submit">
        </div>
        </form>
<link rel="stylesheet" href="tools/wikia.css">
<body>
    <header>
       <center><img src="images/mortera-title-wiki.png" alt="Logo de la Wiki" width="90%"/></center>
    </header>
    <nav>
        <ul>
            <li><button onclick="showSection('news')">Inicio</button></li>
            <li><button onclick="showSection('bestitems')">Items</button></li>
            <li><button onclick="showSection('quests')">Quests</button></li>
            <li><button onclick="showSection('comandos')">Comandos</button></li>
            <li><button onclick="showSection('acercade')">Info</button></li>
            <li><button onclick="showSection('conócenos')">conócenos</button></li>
        </ul>
    </nav>
    <section id="news" class="active">
        <h2>Inicio</h2>
        <p>Bienvenido a la Wikia de Mortera, aquí encontrarás información útil sobre el servidor..</p>
    </section>
    <section id="bestitems">
        <center><h2>Mejores Items en el servidor</h2></center>
       <center><p>Estos son los mejores Items en el servidor y sus estadisticas</p></center>
        <nav>
            <ul>
                <li><button onclick="showSubSection('knight')">Knight</button></li>
                <li><button onclick="showSubSection('paladin')">Paladin</button></li>
                <li><button onclick="showSubSection('druid')">Druid</button></li>
                <li><button onclick="showSubSection('sorcerer')">Sorcerer</button></li>
                <li><button onclick="showSubSection('others')">Otros</button></li>
            </ul>
        </nav>
        <div id="knight" class="sub-section">
            <center><h3>Knight Items</h3></center>
    <div class="container">
        <div class="card-row">
            <div class="static-card" onclick="openCard('card1')">
                <center><img src="images/mortera/vip_axe.png" alt="Click to open card" class="static-card-image"></center>
                <div class="static-card-content">
                    <h3>Vip Axe</h3>
                       <ul>
                           <li>Atk: 105</li>
                           <li>Def: 35</li>
                           <li>Axe: +15</li>
                           <li>CriticalChance: 10%</li>
                           <li>Critical Damage: +65%</li>
                           <li>Life Leech: +5%</li>
                           <li>Mana Leech: +5%</li>
                       </ul>
                    <p>Evoluciona con 15 vip axe en:</p>
                    <center><p>(clik a la imagen)</p></center>
                </div>
            </div>
            <div class="static-card" onclick="openCard('card2')">
                <center><img src="images/mortera/vip_club.png" alt="Click to open card" class="static-card-image"></center>
                <div class="static-card-content">
                    <h3>Vip Club</h3>
                       <ul>
                           <li>Atk: 110</li>
                           <li>Def: 10</li>
                           <li>Axe: +13</li>
                           <li>Critical Chance: 10%</li>
                           <li>Critical Damage: +65%</li>
                           <li>Life Leech: +10%</li>
                           <li>Mana Leech: +10%</li>
                       </ul>
                    <p>Evoluciona con 15 vip club en:</p>
                    <center><p>(clik a la imagen)</p></center>
                </div>
            </div>
            <div class="static-card" onclick="openCard('card3')">
                <center><img src="images/mortera/vip_sword.png" alt="Click to open card" class="static-card-image"></center>
                <div class="static-card-content">
                    <h3>Vip Sword</h3>
                       <ul>
                           <li>Atk: 100</li>
                           <li>Def: 40, +5</li>
                           <li>club: +18</li>
                           <li>Critical Chance: 10%</li>
                           <li>Critical Damage: +65%</li>
                           <li>Life Leech: +5%</li>
                           <li>Mana Leech: +5%</li>
                       </ul>
                    <p>Evoluciona con 15 vip swords en:</p>
                    <center><p>(clik a la imagen)</p></center>
                </div>
            </div>
			<div class="static-card" onclick="openCard('card4')">
                <center><img src="images/mortera/vip_helmet.png" alt="Click to open card" class="static-card-image"></center>
                <div class="static-card-content">
				<h3>Vip Helmet</h3>
                       <ul>
                           <li>Arm: 40</li>
                           <li>Club: +12</li>
                           <li>Sword: +12</li>
                           <li>Axe: +12</li>
                           <li>Shield: +12</li>
                           <li>Critical Dmg: +10%</li>
                           <li>Life Leech: +5%</li>
                           <li>Mana Leech: +5%</li>
                           <li>Magic Lvl: +2</li>
                           <li>Heal MLvl: +5</li>
                           <li>protect all: +6%</li>
						   <li>Fast Regeneration</li>
                       </ul>
                    <p>Evoluciona con 15 vip helmets en:</p>
                    <center><p>(clik a la imagen)</p></center>
                </div>
            </div>
			<div class="static-card" onclick="openCard('card5')">
                <center><img src="images/mortera/44884.gif" alt="Click to open card" class="static-card-image"></center>
                <div class="static-card-content">
				<h3>Vip Armor</h3>
                       <ul>
                           <li>Arm: 45</li>
                           <li>Club: +20</li>
                           <li>Sword: +20</li>
                           <li>Axe: +20</li>
                           <li>Shield: +20</li>
                           <li>Critical Dmg: +12%</li>
                           <li>Life Leech: +5%</li>
                           <li>Mana Leech: +5%</li>
                           <li>Heal MLvl: +7</li>
                           <li>protect all: +6%</li>
						   <li>Fast Regeneration</li>
                       </ul>
                    <p>Evoluciona con 15 vip armors en:</p>
                    <center><p>(clik a la imagen)</p></center>
                </div>
            </div>
			<div class="static-card" onclick="openCard('card6')">
                <center><img src="images/mortera/44888.gif" alt="Click to open card" class="static-card-image"></center>
                <div class="static-card-content">
				<h3>Vip Legs</h3>
                       <ul>
                           <li>Arm: 40</li>
                           <li>Club: +10</li>
                           <li>Sword: +10</li>
                           <li>Axe: +10</li>
                           <li>Shield: +10</li>
                           <li>Critical Dmg: +11%</li>
                           <li>Life Leech: +5%</li>
                           <li>Mana Leech: +5%</li>
                           <li>Heal MLvl: +2</li>
                           <li>protect all: +6%</li>
						   <li>Fast Regeneration</li>
                       </ul>
                    <p>Evoluciona con 15 vip legs en:</p>
                    <center><p>(clik a la imagen)</p></center>
                </div>
            </div>
			<div class="static-card" onclick="openCard('card7')">
                <center><img src="images/mortera/44891.gif" alt="Click to open card" class="static-card-image"></center>
                <div class="static-card-content">
				<h3>Vip Boots</h3>
                       <ul>
                           <li>Arm: 40</li>
                           <li>Club: +10</li>
                           <li>Sword: +10</li>
                           <li>Axe: +10</li>
                           <li>Shield: +10</li>
                           <li>Critical Dmg: +5%</li>
                           <li>Life Leech: +5%</li>
                           <li>Mana Leech: +5%</li>
                           <li>Speed: +100</li>
                           <li>protect all: +6%</li>
                           <li>Fast Regeneration</li>
                       </ul>
                    <p>Evoluciona con 15 vip boots en:</p>
                    <center><p>(clik a la imagen)</p></center>
                </div>
            </div>
			<div class="static-card" onclick="openCard('card8')">
                <center><img src="images/mortera/44885.gif" alt="Click to open card" class="static-card-image"></center>
                <div class="static-card-content">
				<h3>Vip Shield</h3>
                       <ul>
                           <li>Def: 80</li>
                           <li>Club: +10</li>
                           <li>Sword: +10</li>
                           <li>Axe: +10</li>
                           <li>Shield: +10</li>
                           <li>Critical Dmg: +10%</li>
                           <li>Life Leech: +5%</li>
                           <li>Mana Leech: +5%</li>
                           <li>protect all: +6%</li>
						   <li>Heal MLvl: +3</li>
                           <li>Fast Regeneration</li>
                       </ul>
                    <p>Evoluciona con 15 vip shields en:</p>
                    <center><p>(clik a la imagen)</p></center>
                </div>
            </div>
			<div class="static-card" onclick="openCard('card9')">
                <center><img src="images/mortera/44887.gif" alt="Click to open card" class="static-card-image"></center>
                <div class="static-card-content">
				<h3>Vip Ring</h3>
                       <ul>
                           <li>Club: +10</li>
                           <li>Sword: +10</li>
                           <li>Axe: +10</li>
                           <li>Shield: +10</li>
                           <li>Critical Dmg: +10%</li>
                           <li>Life Leech: +5%</li>
                           <li>Mana Leech: +5%</li>
                           <li>protect all: +6%</li>
						   <li>Heal MLvl: +2</li>
                           <li>Fast Regeneration</li>
                       </ul>
                    <p>Evoluciona con 15 vip rings en:</p>
                    <center><p>(clik a la imagen)</p></center>
                </div>
            </div>
			<div class="static-card" onclick="openCard('card10')">
                <center><img src="images/mortera/44881.gif" alt="Click to open card" class="static-card-image"></center>
                <div class="static-card-content">
				<h3>Vip Amulet</h3>
                       <ul>
					       <li>Arm: 20</li>
                           <li>Club: +10</li>
                           <li>Sword: +10</li>
                           <li>Axe: +10</li>
                           <li>Shield: +10</li>
                           <li>Critical Dmg: +10%</li>
                           <li>Life Leech: +5%</li>
                           <li>Mana Leech: +5%</li>
                           <li>protect all: +6%</li>
                           <li>Fast Regeneration</li>
                       </ul>
                    <p>Evoluciona con 15 vip amulets en:</p>
                    <center><p>(clik a la imagen)</p></center>
                </div>
            </div>
			<div class="static-card" onclick="openCard('card11')">
                <center><img src="images/mortera/44889.gif" alt="Click to open card" class="static-card-image"></center>
                <div class="static-card-content">
				<h3>Vip Skull</h3>
                       <ul>
                           <li>Club: +10</li>
                           <li>Sword: +10</li>
                           <li>Axe: +10</li>
                           <li>Shield: +10</li>
                           <li>Critical Dmg: +5%</li>
                           <li>Life Leech: +5%</li>
                           <li>Mana Leech: +5%</li>
                           <li>protect all: +6%</li>
						   <li>Heal MLvl: +2</li>
						   <li>Magic Lvl: +10</li>
                           <li>Fast Regeneration</li>
                       </ul>
                    <p>Evoluciona con 15 vip Skull en:</p>
                    <center><p>(clik a la imagen)</p></center>
                </div>
            </div>
        </div>
        <div id="card1" class="floating-card">
            <div class="floating-card-content">
                <span class="close" onclick="closeCard('card1')">&times;</span>
				<h3>Ultimatum Axe</h3>
                <img src="images/mortera/ultimatum_axe.png" alt="Card image" class="floating-card-image">
                       <ul>
                           <li>Atk: 210</li>
                           <li>Def: 70</li>
                           <li>Axe Fighting: +30</li>
                           <li>Critical Hit Chance: 10%</li>
                           <li>Critical Extra Damage: +90%</li>
                           <li>Life Leech Amount: +10%</li>
                           <li>Mana Leech Amount: +10%</li>
                           <li>Cleave: +50%</li>
                       </ul>
            </div>
        </div>
        
        <div id="card2" class="floating-card">
            <div class="floating-card-content">
                <span class="close" onclick="closeCard('card2')">&times;</span>
                <h3>Ultimatum Club</h3>
                <img src="images/mortera/ultimatum_club.png" alt="Card image" class="floating-card-image">
                        <ul>
                           <li>Atk: 220</li>
                           <li>Def: 20</li>
                           <li>Axe Fighting: +26</li>
                           <li>Critical Hit Chance: 10%</li>
                           <li>Critical Extra Damage: +90%</li>
                           <li>Life Leech Amount: +10%</li>
                           <li>Mana Leech Amount: +10%</li>
                           <li>Cleave: +50%</li>
                       </ul>
            </div>
        </div>
        
        <div id="card3" class="floating-card">
            <div class="floating-card-content">
                <span class="close" onclick="closeCard('card3')">&times;</span>
                <h3>Ultimatum Sword</h3>
                <img src="images/mortera/ultimatum_sword.png" alt="Card image" class="floating-card-image">
                <ul>
                           <li>Atk: 200</li>
                           <li>Def: 80</li>
                           <li>Axe Fighting: +36</li>
                           <li>Critical Hit Chance: 10%</li>
                           <li>Critical Extra Damage: +90%</li>
                           <li>Life Leech Amount: +10%</li>
                           <li>Mana Leech Amount: +10%</li>
                           <li>Cleave: +50%</li>
                       </ul>
            </div>
        </div>
		<div id="card4" class="floating-card">
            <div class="floating-card-content">
                <span class="close" onclick="closeCard('card4')">&times;</span>
                <h3>Ultimatum Helmet</h3>
                <img src="images/mortera/ultimatum_helmet.png" alt="Card image" class="floating-card-image">
                        <ul>
                           <li>Arm: 80</li>
                           <li>Club Fighting: +24</li>
                           <li>Sword Fighting: +24</li>
                           <li>Axe Fighting: +24</li>
                           <li>Shielding: +24</li>
                           <li>Critical Extra Damage: +20%</li>
                           <li>Life Leech Amount: +10%</li>
                           <li>Mana Leech Amount: +10%</li>
                           <li>Damage Reflection: +25%</li>
                           <li>protection all: +9%</li>
						   <li>Fast Regeneration</li>
                       </ul>
            </div>
        </div>
		<div id="card5" class="floating-card">
            <div class="floating-card-content">
                <span class="close" onclick="closeCard('card5')">&times;</span>
                <h3>Ultimatum Armor</h3>
                <img src="images/mortera/44902.gif" alt="Card image" class="floating-card-image">
                        <ul>
                           <li>Arm: 100</li>
                           <li>Club Fighting: +40</li>
                           <li>Sword Fighting: +40</li>
                           <li>Axe Fighting: +40</li>
                           <li>Shielding: +40</li>
                           <li>Critical Extra Damage: +24%</li>
                           <li>Life Leech Amount: +10%</li>
                           <li>Mana Leech Amount: +10%</li>
                           <li>Damage Reflection: +25%</li>
                           <li>protection all: +9%</li>
						   <li>Fast Regeneration</li>
                       </ul>
            </div>
        </div>
		<div id="card6" class="floating-card">
            <div class="floating-card-content">
                <span class="close" onclick="closeCard('card6')">&times;</span>
                <h3>Ultimatum Legs</h3>
                <img src="images/mortera/44898.gif" alt="Card image" class="floating-card-image">
                        <ul>
                           <li>Arm: 80</li>
                           <li>Club Fighting: +24</li>
                           <li>Sword Fighting: +24</li>
                           <li>Axe Fighting: +24</li>
                           <li>Shielding: +24</li>
                           <li>Critical Extra Damage: +22%</li>
                           <li>Life Leech Amount: +10%</li>
                           <li>Mana Leech Amount: +10%</li>
                           <li>Damage Reflection: +25%</li>
						   <li>Heal MLvl: +14</li>
                           <li>protection all: +9%</li>
						   <li>Fast Regeneration</li>
                       </ul>
            </div>
        </div>
		<div id="card7" class="floating-card">
            <div class="floating-card-content">
                <span class="close" onclick="closeCard('card7')">&times;</span>
                <h3>Ultimatum boots</h3>
                <img src="images/mortera/44900.gif" alt="Card image" class="floating-card-image">
                        <ul>
                           <li>Arm: 80</li>
                           <li>Club Fighting: +20</li>
                           <li>Sword Fighting: +20</li>
                           <li>Axe Fighting: +20</li>
                           <li>Shielding: +20</li>
                           <li>Critical Extra Damage: +10%</li>
                           <li>Life Leech Amount: +10%</li>
                           <li>Mana Leech Amount: +10%</li>
                           <li>Damage Reflection: +25%</li>
						   <li>Heal MLvl: +10</li>
                           <li>protection all: +9%</li>
						   <li>Fast Regeneration</li>
                       </ul>
            </div>
        </div>
		<div id="card8" class="floating-card">
            <div class="floating-card-content">
                <span class="close" onclick="closeCard('card8')">&times;</span>
                <h3>Ultimatum Shield</h3>
                <img src="images/mortera/44895.gif" alt="Card image" class="floating-card-image">
                        <ul>
                           <li>Def: 80</li>
                           <li>Club Fighting: +20</li>
                           <li>Sword Fighting: +20</li>
                           <li>Axe Fighting: +20</li>
                           <li>Shielding: +20</li>
                           <li>Critical Extra Damage: +20%</li>
                           <li>Life Leech Amount: +10%</li>
                           <li>Mana Leech Amount: +10%</li>
                           <li>Damage Reflection: +25%</li>
						   <li>Heal MLvl: +10</li>
                           <li>protection all: +9%</li>
						   <li>Fast Regeneration</li>
                       </ul>
            </div>
        </div>
		<div id="card9" class="floating-card">
            <div class="floating-card-content">
                <span class="close" onclick="closeCard('card9')">&times;</span>
                <h3>Ultimatum Right Ring</h3>
                <img src="images/mortera/44896.gif" alt="Card image" class="floating-card-image">
                        <ul>
                           <li>Club Fighting: +20</li>
                           <li>Sword Fighting: +20</li>
                           <li>Axe Fighting: +20</li>
                           <li>Shielding: +20</li>
                           <li>Critical Extra Damage: +20%</li>
                           <li>Life Leech Amount: +10%</li>
                           <li>Mana Leech Amount: +10%</li>
                           <li>Damage Reflection: +9%</li>
						   <li>Heal MLvl: +10</li>
                           <li>protection all: +9%</li>
						   <li>Super Regeneration</li>
                       </ul>
            </div>
        </div>
		<div id="card10" class="floating-card">
            <div class="floating-card-content">
                <span class="close" onclick="closeCard('card10')">&times;</span>
                <h3>Ultimatum Amulet</h3>
                <img src="images/mortera/44892.gif" alt="Card image" class="floating-card-image">
                        <ul>
						   <li>Arm: 50</li>
                           <li>Club Fighting: +20</li>
                           <li>Sword Fighting: +20</li>
                           <li>Axe Fighting: +20</li>
                           <li>Shielding: +20</li>
                           <li>Critical Extra Damage: +20%</li>
                           <li>Life Leech Amount: +10%</li>
                           <li>Mana Leech Amount: +10%</li>
                           <li>Damage Reflection: +9%</li>
                           <li>protection all: +9%</li>
						   <li>Fast Regeneration</li>
                       </ul>
            </div>
        </div>
		<div id="card11" class="floating-card">
            <div class="floating-card-content">
                <span class="close" onclick="closeCard('card11')">&times;</span>
                <h3>Ultimatum Left Ring</h3>
                <img src="images/mortera/44896.gif" alt="Card image" class="floating-card-image">
                        <ul>
                           <li>Club Fighting: +20</li>
                           <li>Sword Fighting: +20</li>
                           <li>Axe Fighting: +20</li>
                           <li>Shielding: +20</li>
                           <li>Critical Extra Damage: +20%</li>
                           <li>Life Leech Amount: +10%</li>
                           <li>Mana Leech Amount: +10%</li>
                           <li>Damage Reflection: +9%</li>
						   <li>Heal MLvl: +10</li>
                           <li>protection all: +9%</li>
						   <li>Super Regeneration</li>
                       </ul>
            </div>
        </div>
    </div>
        </div>
        <div id="paladin" class="sub-section">
            <center><h3>Paladin Items</h3></center>
    <div class="container">
        <div class="card-row">
	        <div class="static-card" onclick="openCard('card12')">
                <center><img src="images/mortera/22048.gif" alt="Click to open card" class="static-card-image"></center>
                <div class="static-card-content">
                    <h3>Vip Arrow</h3>
                       <ul>
                           <li>Expansive arrow attack: 80</li>
                       </ul>
                </div>
            </div>
	        <div class="static-card" onclick="openCard('card13')">
                <center><img src="images/mortera/22047.gif" alt="Click to open card" class="static-card-image"></center>
                <div class="static-card-content">
                    <h3>Vip Bolt</h3>
                       <ul>
                           <li>Super bolt attack: 120</li>
                       </ul>
                </div>
            </div>
	        <div class="static-card" onclick="openCard('card14')">
                <center><img src="images/mortera/44840.gif" alt="Click to open card" class="static-card-image"></center>
                <div class="static-card-content">
                    <h3>Vip Paladin Amulet</h3>
                       <ul>
                           <li>Arm: 20</li>
                           <li>Distance: +10</li>
                           <li>Critical Dmg: +10%</li>
                           <li>Life Leech: +5%</li>
                           <li>Mana Leech: +5%</li>
                           <li>Magic Lvl: +5</li>
                           <li>Holy MLvl: +5</li>
                           <li>protect all: +6%</li>
						   <li>Fast Regeneration</li>
                       </ul>
                    <p>Evoluciona con 15 vip paladin amulets en:</p>
                    <center><p>(clik a la imagen)</p></center>
                </div>
            </div>
	        <div class="static-card" onclick="openCard('card15')">
                <center><img src="images/mortera/44849.gif" alt="Click to open card" class="static-card-image"></center>
                <div class="static-card-content">
                    <h3>Vip Paladin Boots</h3>
                       <ul>
                           <li>Arm: 40</li>
                           <li>Distance: +10</li>
                           <li>Critical Dmg: +5%</li>
                           <li>Life Leech: +5%</li>
                           <li>Mana Leech: +5%</li>
                           <li>Magic Lvl: +5</li>
                           <li>Healing MLvl: +5</li>
                           <li>protect all: +6%</li>
                           <li>Speed: +100</li>
						   <li>Fast Regeneration</li>
                       </ul>
                    <p>Evoluciona con 15 vip paladin boots en:</p>
                    <center><p>(clik a la imagen)</p></center>
                </div>
            </div>
	        <div class="static-card" onclick="openCard('card16')">
                <center><img src="images/mortera/44842.gif" alt="Click to open card" class="static-card-image"></center>
                <div class="static-card-content">
                    <h3>Vip Paladin Bow</h3>
                       <ul>
                           <li>Range: 6</li>
						   <li>Attack: +18</li>
						   <li>Hit%: +12</li>
                           <li>Distance: +10</li>
						   <li>Critical Chance: +10%</li>
                           <li>Critical Dmg: +65%</li>
                           <li>Life Leech: +5%</li>
                           <li>Mana Leech: +5%</li>
                           <li>Healing MLvl: +10</li>
                           <li>Holy MLvl: +10</li>
                           <li>protect all: +6%</li>
						   <li>Fast Regeneration</li>
                       </ul>
                    <p>Evoluciona con 15 vip paladin bows en:</p>
                    <center><p>(clik a la imagen)</p></center>
                </div>
            </div>
	        <div class="static-card" onclick="openCard('card17')">
                <center><img src="images/mortera/44848.gif" alt="Click to open card" class="static-card-image"></center>
                <div class="static-card-content">
                    <h3>Vip Paladin Coif</h3>
                       <ul>
                           <li>Arm: 40</li>
						   <li>Distance: +12</li>
						   <li>Critical Dmg: +10%</li>
                           <li>Life Leech: +5%</li>
                           <li>Mana Leech: +5%</li>
                           <li>Magic Lvl: +2</li>
						   <li>Healing MLvl: +7</li>
                           <li>Holy MLvl: +7</li>
                           <li>protect all: +6%</li>
						   <li>Fast Regeneration</li>
                       </ul>
                    <p>Evoluciona con 15 vip paladin coifs en:</p>
                    <center><p>(clik a la imagen)</p></center>
                </div>
            </div>
			<div class="static-card" onclick="openCard('card18')">
                <center><img src="images/mortera/44848.gif" alt="Click to open card" class="static-card-image"></center>
                <div class="static-card-content">
                    <h3>Vip Paladin Crossbow</h3>
                       <ul>
                           <li>Range: 6</li>
						   <li>Attack: +25</li>
						   <li>Hit%: +14</li>
                           <li>Distance: +10</li>
						   <li>Critical Chance: +10%</li>
                           <li>Critical Dmg: +65%</li>
                           <li>Life Leech: +5%</li>
                           <li>Mana Leech: +5%</li>
                           <li>Healing MLvl: +10</li>
                           <li>Holy MLvl: +10</li>
                           <li>protect all: +6%</li>
						   <li>Fast Regeneration</li>
                       </ul>
                    <p>Evoluciona con 15 vip paladin crossbows en:</p>
                    <center><p>(clik a la imagen)</p></center>
                </div>
            </div>
			<div class="static-card" onclick="openCard('card19')">
                <center><img src="images/mortera/44844.gif" alt="Click to open card" class="static-card-image"></center>
                <div class="static-card-content">
                    <h3>Vip Paladin Escutcheon</h3>
                       <ul>
                           <li>Vol: 8</li>
						   <li>Distance: +10</li>
						   <li>Critical Dmg: +10%</li>
                           <li>Life Leech: +5%</li>
                           <li>Mana Leech: +5%</li>
                           <li>Magic Lvl: +5</li>
						   <li>Healing MLvl: +8</li>
                           <li>Holy MLvl: +8</li>
                           <li>protect all: +6%</li>
						   <li>Fast Regeneration</li>
                       </ul>
                    <p>Evoluciona con 15 vip paladin escutcheons en:</p>
                    <center><p>(clik a la imagen)</p></center>
                </div>
            </div>
			<div class="static-card" onclick="openCard('card20')">
                <center><img src="images/mortera/44847.gif" alt="Click to open card" class="static-card-image"></center>
                <div class="static-card-content">
                    <h3>Vip Paladin Falcon</h3>
                       <ul>
						   <li>Distance: +10</li>
						   <li>Critical Dmg: +5%</li>
                           <li>Life Leech: +5%</li>
                           <li>Mana Leech: +5%</li>
                           <li>Magic Lvl: +3</li>
                           <li>Holy MLvl: +10</li>
                           <li>protect all: +6%</li>
						   <li>Fast Regeneration</li>
                       </ul>
                    <p>Evoluciona con 15 vip paladin falcons en:</p>
                    <center><p>(clik a la imagen)</p></center>
                </div>
            </div>
			<div class="static-card" onclick="openCard('card21')">
                <center><img src="images/mortera/44846.gif" alt="Click to open card" class="static-card-image"></center>
                <div class="static-card-content">
                    <h3>Vip Paladin Greaves</h3>
                       <ul>
                           <li>Arm: 40</li>
                           <li>Distance: +10</li>
                           <li>Critical Dmg: +11%</li>
                           <li>Life Leech: +5%</li>
                           <li>Mana Leech: +5%</li>
                           <li>Magic Lvl: +12</li>
                           <li>Healing MLvl: +7</li>
						   <li>Holy MLvl: +7</li>
                           <li>protect all: +6%</li>
						   <li>Fast Regeneration</li>
                       </ul>
                    <p>Evoluciona con 15 vip paladin greaves en:</p>
                    <center><p>(clik a la imagen)</p></center>
                </div>
            </div>
			<div class="static-card" onclick="openCard('card22')">
                <center><img src="images/mortera/44843.gif" alt="Click to open card" class="static-card-image"></center>
                <div class="static-card-content">
                    <h3>Vip Paladin Plate</h3>
                       <ul>
                           <li>Arm: 45</li>
                           <li>Distance: +20</li>
                           <li>Critical Dmg: +12%</li>
                           <li>Life Leech: +5%</li>
                           <li>Mana Leech: +5%</li>
                           <li>Magic Lvl: +5</li>
                           <li>Healing MLvl: +7</li>
						   <li>Holy MLvl: +7</li>
                           <li>protect all: +6%</li>
						   <li>Fast Regeneration</li>
                       </ul>
                    <p>Evoluciona con 15 vip paladin plates en:</p>
                    <center><p>(clik a la imagen)</p></center>
                </div>
            </div>
			<div class="static-card" onclick="openCard('card23')">
                <center><img src="images/mortera/44845.gif" alt="Click to open card" class="static-card-image"></center>
                <div class="static-card-content">
                    <h3>Vip Paladin Ring</h3>
                       <ul>
						   <li>Distance: +10</li>
						   <li>Critical Dmg: +5%</li>
                           <li>Life Leech: +5%</li>
                           <li>Mana Leech: +5%</li>
                           <li>Magic Lvl: +2</li>
                           <li>Holy MLvl: +10</li>
                           <li>protect all: +6%</li>
						   <li>Fast Regeneration</li>
                       </ul>
                    <p>Evoluciona con 15 vip paladin rings en:</p>
                    <center><p>(clik a la imagen)</p></center>
                </div>
            </div>
		</div>
	        <div id="card14" class="floating-card">
            <div class="floating-card-content">
                <span class="close" onclick="closeCard('card14')">&times;</span>
				<h3>Ultimatum Paladin Amulet</h3>
                <img src="images/mortera/44860.gif" alt="Card image" class="floating-card-image">
                       <ul>
                           <li>Arm: 50</li>
						   <li>Distance: +20</li>
						   <li>Critical Dmg: +20%</li>
                           <li>Life Leech: +10%</li>
                           <li>Mana Leech: +10%</li>
                           <li>Healing MLvl: +10</li>
                           <li>Holy MLvl: +10</li>
						   <li>Damage Reflection: +9</li>
                           <li>protect all: +6%</li>
						   <li>Fast Regeneration</li>
                       </ul>
            </div>
        </div>
        
	        <div id="card15" class="floating-card">
            <div class="floating-card-content">
                <span class="close" onclick="closeCard('card15')">&times;</span>
				<h3>Ultimatum Paladin Galoshes</h3>
                <img src="images/mortera/44869.gif" alt="Card image" class="floating-card-image">
                       <ul>
                           <li>Arm: 80</li>
						   <li>Distance: +22</li>
						   <li>Critical Dmg: +10%</li>
                           <li>Life Leech: +10%</li>
                           <li>Mana Leech: +10%</li>
						   <li>Magic Lvl: +10</li>
                           <li>Healing MLvl: +20</li>
						   <li>Damage Reflection: +25</li>
                           <li>protect all: +9%</li>
						   <li>Speed: +200</li>
						   <li>Fast Regeneration</li>
                       </ul>
            </div>
        </div>

	        <div id="card16" class="floating-card">
            <div class="floating-card-content">
                <span class="close" onclick="closeCard('card16')">&times;</span>
				<h3>Ultimatum Paladin Bow</h3>
                <img src="images/mortera/44862.gif" alt="Card image" class="floating-card-image">
                       <ul>
                           <li>Range: 7</li>
						   <li>Attack: +55</li>
						   <li>Hit%: +24</li>
                           <li>Distance: +60</li>
						   <li>Critical Chance: +10%</li>
                           <li>Critical Dmg: +130%</li>
                           <li>Life Leech: +10%</li>
                           <li>Mana Leech: +10%</li>
                           <li>Healing MLvl: +20</li>
                           <li>Holy MLvl: +20</li>
						   <li>Perfect shot: +50 at range 4</li>
                           <li>protect all: +10%</li>
						   <li>Fast Regeneration</li>
                       </ul>
            </div>
        </div>

	        <div id="card17" class="floating-card">
            <div class="floating-card-content">
                <span class="close" onclick="closeCard('card17')">&times;</span>
				<h3>Ultimatum Paladin Helmet</h3>
                <img src="images/mortera/44861.gif" alt="Card image" class="floating-card-image">
                       <ul>
                           <li>Arm: 80</li>
						   <li>Distance: +24</li>
						   <li>Critical Dmg: +20%</li>
                           <li>Life Leech: +10%</li>
                           <li>Mana Leech: +10%</li>
                           <li>Healing MLvl: +14</li>
                           <li>Holy MLvl: +14</li>
						   <li>Damage Reflection: +25</li>
                           <li>protect all: +9%</li>
						   <li>Fast Regeneration</li>
                       </ul>
            </div>
        </div>
	        <div id="card18" class="floating-card">
            <div class="floating-card-content">
                <span class="close" onclick="closeCard('card18')">&times;</span>
				<h3>Ultimatum Paladin Crossbow</h3>
                <img src="images/mortera/44868.gif" alt="Card image" class="floating-card-image">
                       <ul>
                           <li>Range: 7</li>
						   <li>Attack: +75</li>
						   <li>Hit%: +35</li>
                           <li>Distance: +55</li>
						   <li>Critical Chance: +10%</li>
                           <li>Critical Dmg: +140%</li>
                           <li>Life Leech: +10%</li>
                           <li>Mana Leech: +10%</li>
                           <li>Healing MLvl: +20</li>
                           <li>Holy MLvl: +20</li>
						   <li>Perfect shot: +70 at range 4</li>
                           <li>protect all: +10%</li>
						   <li>Fast Regeneration</li>
                       </ul>
            </div>
        </div>
	        <div id="card19" class="floating-card">
            <div class="floating-card-content">
                <span class="close" onclick="closeCard('card19')">&times;</span>
				<h3>Ultimatum Paladin Quiver</h3>
                <img src="images/mortera/44864.gif" alt="Card image" class="floating-card-image">
                       <ul>
                           <li>Vol: 8</li>
						   <li>Distance: +20</li>
						   <li>Critical Dmg: +20%</li>
                           <li>Life Leech: +10%</li>
                           <li>Mana Leech: +10%</li>
                           <li>Magic Lvl: +10</li>
						   <li>Healing MLvl: +16</li>
                           <li>Holy MLvl: +16</li>
						   <li>Damage Reflection: +25</li>
                           <li>protect all: +9%</li>
						   <li>Fast Regeneration</li>
                       </ul>
            </div>
        </div>
	        <div id="card20" class="floating-card">
            <div class="floating-card-content">
                <span class="close" onclick="closeCard('card20')">&times;</span>
				<h3>Ultimatum Paladin Eye</h3>
                <img src="images/mortera/44867.gif" alt="Card image" class="floating-card-image">
                       <ul>
						   <li>Distance: +20</li>
						   <li>Critical Dmg: +20%</li>
                           <li>Life Leech: +10%</li>
                           <li>Mana Leech: +10%</li>
						   <li>Healing MLvl: +10</li>
                           <li>Holy MLvl: +10</li>
						   <li>Damage Reflection: +9</li>
                           <li>protect all: +9%</li>
						   <li>Fast Regeneration</li>
                       </ul>
            </div>
        </div>
	        <div id="card21" class="floating-card">
            <div class="floating-card-content">
                <span class="close" onclick="closeCard('card21')">&times;</span>
				<h3>Ultimatum Paladin Greaves</h3>
                <img src="images/mortera/44866.gif" alt="Card image" class="floating-card-image">
                       <ul>
                           <li>Arm: 80</li>
						   <li>Distance: +22</li>
						   <li>Critical Dmg: +22%</li>
                           <li>Life Leech: +10%</li>
                           <li>Mana Leech: +10%</li>
                           <li>Healing MLvl: +14</li>
                           <li>Holy MLvl: +14</li>
						   <li>Damage Reflection: +25</li>
                           <li>protect all: +9%</li>
						   <li>Fast Regeneration</li>
                       </ul>
            </div>
        </div>
	        <div id="card22" class="floating-card">
            <div class="floating-card-content">
                <span class="close" onclick="closeCard('card22')">&times;</span>
				<h3>Ultimatum Paladin Armor</h3>
                <img src="images/mortera/44863.gif" alt="Card image" class="floating-card-image">
                       <ul>
                           <li>Arm: 80</li>
						   <li>Distance: +22</li>
						   <li>Critical Dmg: +22%</li>
                           <li>Life Leech: +10%</li>
                           <li>Mana Leech: +10%</li>
                           <li>Healing MLvl: +14</li>
                           <li>Holy MLvl: +14</li>
						   <li>Damage Reflection: +25</li>
                           <li>protect all: +9%</li>
						   <li>Fast Regeneration</li>
                       </ul>
            </div>
        </div>
	        <div id="card23" class="floating-card">
            <div class="floating-card-content">
                <span class="close" onclick="closeCard('card23')">&times;</span>
				<h3>Ultimatum Paladin Ring</h3>
                <img src="images/mortera/44865.gif" alt="Card image" class="floating-card-image">
                       <ul>
						   <li>Distance: +20</li>
						   <li>Critical Dmg: +20%</li>
                           <li>Life Leech: +10%</li>
                           <li>Mana Leech: +10%</li>
                           <li>Healing MLvl: +14</li>
                           <li>Holy MLvl: +14</li>
						   <li>Damage Reflection: +9</li>
                           <li>protect all: +9%</li>
						   <li>Fast Regeneration</li>
                       </ul>
            </div>
        </div>
   </div>
</div>
        <div id="druid" class="sub-section">
            <center><h3>Druid Items</h3></center>
    <div class="container">
        <div class="card-row">
	        <div class="static-card" onclick="openCard('card24')">
                <center><img src="images/mortera/44827.gif" alt="Click to open card" class="static-card-image"></center>
                <div class="static-card-content">
                    <h3>Vip Druid Amulet</h3>
                       <ul>
                           <li>Arm: 15</li>
                           <li>Critical Dmg: +10%</li>
                           <li>Life Leech: +5%</li>
                           <li>Mana Leech: +5%</li>
                           <li>Magic Lvl: +12</li>
                           <li>Earth MLvl: +5</li>
						   <li>Ice MLvl: +5</li>
                           <li>protect all: +6%</li>
						   <li>Fast Regeneration</li>
                       </ul>
					<p>Evoluciona con 15 vip druid amulets en:</p>
                    <center><p>(clik a la imagen)</p></center>
                </div>
            </div>
	        <div class="static-card" onclick="openCard('card25')">
                <center><img src="images/mortera/44829.gif" alt="Click to open card" class="static-card-image"></center>
                <div class="static-card-content">
                    <h3>Vip Druid Boots</h3>
                       <ul>
                           <li>Arm: 30</li>
                           <li>Critical Dmg: +5%</li>
                           <li>Life Leech: +5%</li>
                           <li>Mana Leech: +5%</li>
                           <li>Magic Lvl: +10</li>
                           <li>Healing MLvl: +5</li>
                           <li>protect all: +6%</li>
						   <li>Speed: +100</li>
						   <li>Fast Regeneration</li>
                       </ul>
					<p>Evoluciona con 15 vip druid boots en:</p>
                    <center><p>(clik a la imagen)</p></center>
                </div>
            </div>
	        <div class="static-card" onclick="openCard('card26')">
                <center><img src="images/mortera/44824.gif" alt="Click to open card" class="static-card-image"></center>
                <div class="static-card-content">
                    <h3>Vip Druid Greaves</h3>
                       <ul>
                           <li>Arm: 30</li>
                           <li>Critical Dmg: +11%</li>
                           <li>Life Leech: +5%</li>
                           <li>Mana Leech: +5%</li>
                           <li>Magic Lvl: +12</li>
                           <li>Earth MLvl: +7</li>
						   <li>Ice MLvl: +7</li>
                           <li>protect all: +6%</li>
						   <li>Fast Regeneration</li>
                       </ul>
                    <p>Evoluciona con 15 vip druid greaves en:</p>
                    <center><p>(clik a la imagen)</p></center>
                </div>
            </div>
	        <div class="static-card" onclick="openCard('card27')">
                <center><img src="images/mortera/44822.gif" alt="Click to open card" class="static-card-image"></center>
                <div class="static-card-content">
                    <h3>Vip Druid Helmet</h3>
                       <ul>
                           <li>Arm: 30</li>
                           <li>Critical Dmg: +10%</li>
                           <li>Life Leech: +5%</li>
                           <li>Mana Leech: +5%</li>
                           <li>Magic Lvl: +12</li>
                           <li>Earth MLvl: +7</li>
						   <li>Healing MLvl: +7</li>
                           <li>protect all: +6%</li>
						   <li>Fast Regeneration</li>
                       </ul>
                    <p>Evoluciona con 15 vip druid helmets en:</p>
                    <center><p>(clik a la imagen)</p></center>
                </div>
            </div>
	        <div class="static-card" onclick="openCard('card28')">
                <center><img src="images/mortera/44828.gif" alt="Click to open card" class="static-card-image"></center>
                <div class="static-card-content">
                    <h3>Vip Druid Opal</h3>
                       <ul>
                           <li>Critical Dmg: +5%</li>
                           <li>Life Leech: +5%</li>
                           <li>Mana Leech: +5%</li>
                           <li>Magic Lvl: +10</li>
                           <li>Earth MLvl: +10</li>
						   <li>Healing MLvl: +10</li>
						   <li>Ice MLvl: +10</li>
                           <li>protect all: +6%</li>
						   <li>Fast Regeneration</li>
                       </ul>
                    <p>Evoluciona con 15 vip druid opals en:</p>
                    <center><p>(clik a la imagen)</p></center>
                </div>
            </div>
	        <div class="static-card" onclick="openCard('card29')">
                <center><img src="images/mortera/44826.gif" alt="Click to open card" class="static-card-image"></center>
                <div class="static-card-content">
                    <h3>Vip Druid Ring</h3>
                       <ul>
                           <li>Critical Dmg: +10%</li>
                           <li>Life Leech: +5%</li>
                           <li>Mana Leech: +5%</li>
                           <li>Magic Lvl: +10</li>
                           <li>Earth MLvl: +10</li>
						   <li>Healing MLvl: +5</li>
						   <li>Ice MLvl: +10</li>
                           <li>protect all: +6%</li>
						   <li>Fast Regeneration</li>
                       </ul>
                    <p>Evoluciona con 15 vip druid rings en:</p>
                    <center><p>(clik a la imagen)</p></center>
                </div>
            </div>
			<div class="static-card" onclick="openCard('card30')">
                <center><img src="images/mortera/44823.gif" alt="Click to open card" class="static-card-image"></center>
                <div class="static-card-content">
                    <h3>Vip Druid Robe</h3>
                       <ul>
                           <li>Arm: 35</li>
                           <li>Critical Dmg: +12%</li>
                           <li>Life Leech: +5%</li>
                           <li>Mana Leech: +5%</li>
                           <li>Magic Lvl: +20</li>
                           <li>Earth MLvl: +7</li>
						   <li>Healing MLvl: +7</li>
						   <li>Ice MLvl: +7</li>
                           <li>protect all: +6%</li>
						   <li>Fast Regeneration</li>
                       </ul>
                    <p>Evoluciona con 15 vip druid robes en:</p>
                    <center><p>(clik a la imagen)</p></center>
                </div>
            </div>
			<div class="static-card" onclick="openCard('card31')">
                <center><img src="images/mortera/44825.gif" alt="Click to open card" class="static-card-image"></center>
                <div class="static-card-content">
                    <h3>Vip Druid Rod</h3>
                       <ul>
						   <li>Critical Chance: +10%</li>
                           <li>Critical Dmg: +15%</li>
                           <li>Life Leech: +5%</li>
                           <li>Mana Leech: +5%</li>
                           <li>Magic Lvl: +10</li>
                           <li>protect all: +6%</li>
						   <li>Fast Regeneration</li>
                       </ul>
                    <p>Evoluciona con 15 vip druid rods en:</p>
                    <center><p>(clik a la imagen)</p></center>
                </div>
            </div>
			<div class="static-card" onclick="openCard('card32')">
                <center><img src="images/mortera/44830.gif" alt="Click to open card" class="static-card-image"></center>
                <div class="static-card-content">
                    <h3>Vip Druid Spellbook</h3>
                       <ul>
                           <li>Def: 50</li>
                           <li>Critical Dmg: +10%</li>
                           <li>Life Leech: +5%</li>
                           <li>Mana Leech: +5%</li>
                           <li>Magic Lvl: +10</li>
                           <li>Earth MLvl: +8</li>
						   <li>Ice MLvl: +8</li>
                           <li>protect all: +6%</li>
						   <li>Fast Regeneration</li>
                       </ul>
                    <p>Evoluciona con 15 vip druid spellbooks en:</p>
                    <center><p>(clik a la imagen)</p></center>
                </div>
            </div>
        </div>
	        <div id="card24" class="floating-card">
            <div class="floating-card-content">
                <span class="close" onclick="closeCard('card24')">&times;</span>
				<h3>Ultimatum Druid Amulet</h3>
                <img src="images/mortera/44838.gif" alt="Card image" class="floating-card-image">
                       <ul>
                           <li>Arm: 15</li>
						   <li>Critical Dmg: +20%</li>
                           <li>Life Leech: +10%</li>
                           <li>Mana Leech: +10%</li>
						   <li>Magic Lvl: +24</li>
                           <li>protect all: +9%</li>
						   <li>Fast Regeneration</li>
                       </ul>
            </div>
        </div>
        
	        <div id="card25" class="floating-card">
            <div class="floating-card-content">
                <span class="close" onclick="closeCard('card25')">&times;</span>
				<h3>Ultimatum Druid Boots</h3>
                <img src="images/mortera/44834.gif" alt="Card image" class="floating-card-image">
                       <ul>
                           <li>Arm: 60</li>
						   <li>Critical Dmg: +15%</li>
                           <li>Life Leech: +10%</li>
                           <li>Mana Leech: +10%</li>
                           <li>Magic Lvl: +20</li>
                           <li>Earth MLvl: +15</li>
						   <li>Healing MLvl: +15</li>
						   <li>Ice MLvl: +20</li>
						   <li>Damage Reflection: +25</li>
                           <li>protect all: +9%</li>
						   <li>Speed: +200</li>
						   <li>Fast Regeneration</li>
                       </ul>
            </div>
        </div>

	        <div id="card26" class="floating-card">
            <div class="floating-card-content">
                <span class="close" onclick="closeCard('card26')">&times;</span>
				<h3>Ultimatum Druid Legs</h3>
                <img src="images/mortera/44833.gif" alt="Card image" class="floating-card-image">
                       <ul>
                           <li>Arm: 60</li>
						   <li>Critical Dmg: +25%</li>
                           <li>Life Leech: +10%</li>
                           <li>Mana Leech: +10%</li>
                           <li>Magic Lvl: +24</li>
                           <li>Earth MLvl: +15</li>
						   <li>Healing MLvl: +15</li>
						   <li>Ice MLvl: +20</li>
						   <li>Damage Reflection: +25</li>
                           <li>protect all: +9%</li>
						   <li>Fast Regeneration</li>
                       </ul>
            </div>
        </div>

	        <div id="card27" class="floating-card">
            <div class="floating-card-content">
                <span class="close" onclick="closeCard('card27')">&times;</span>
				<h3>Ultimatum Druid Circlet</h3>
                <img src="images/mortera/44831.gif" alt="Card image" class="floating-card-image">
                       <ul>
                           <li>Arm: 60</li>
						   <li>Critical Dmg: +25%</li>
                           <li>Life Leech: +10%</li>
                           <li>Mana Leech: +10%</li>
                           <li>Magic Lvl: +24</li>
                           <li>Earth MLvl: +15</li>
						   <li>Healing MLvl: +15</li>
						   <li>Ice MLvl: +20</li>
						   <li>Damage Reflection: +25</li>
                           <li>protect all: +9%</li>
						   <li>Fast Regeneration</li>
                       </ul>
            </div>
        </div>

	        <div id="card28" class="floating-card">
            <div class="floating-card-content">
                <span class="close" onclick="closeCard('card28')">&times;</span>
				<h3>Ultimatum Druid Light</h3>
                <img src="images/mortera/44839.gif" alt="Card image" class="floating-card-image">
                       <ul>
						   <li>Critical Dmg: +10%</li>
                           <li>Life Leech: +10%</li>
                           <li>Mana Leech: +10%</li>
                           <li>Magic Lvl: +20</li>
                           <li>Earth MLvl: +15</li>
						   <li>Healing MLvl: +15</li>
						   <li>Ice MLvl: +20</li>
                           <li>protect all: +9%</li>
						   <li>Fast Regeneration</li>
                       </ul>
            </div>
        </div>

	        <div id="card29" class="floating-card">
            <div class="floating-card-content">
                <span class="close" onclick="closeCard('card29')">&times;</span>
				<h3>Ultimatum Druid Ring</h3>
                <img src="images/mortera/44836.gif" alt="Card image" class="floating-card-image">
                       <ul>
						   <li>Critical Dmg: +25%</li>
                           <li>Life Leech: +10%</li>
                           <li>Mana Leech: +10%</li>
                           <li>Magic Lvl: +20</li>
                           <li>Earth MLvl: +15</li>
						   <li>Healing MLvl: +15</li>
						   <li>Ice MLvl: +20</li>
						   <li>Damage Reflection: +25</li>
                           <li>protect all: +9%</li>
						   <li>Fast Regeneration</li>
                       </ul>
            </div>
        </div>

	        <div id="card30" class="floating-card">
            <div class="floating-card-content">
                <span class="close" onclick="closeCard('card30')">&times;</span>
				<h3>Ultimatum Druid Cloack</h3>
                <img src="images/mortera/44832.gif" alt="Card image" class="floating-card-image">
                       <ul>
                           <li>Arm: 70</li>
						   <li>Critical Dmg: +24%</li>
                           <li>Life Leech: +10%</li>
                           <li>Mana Leech: +10%</li>
                           <li>Magic Lvl: +40</li>
                           <li>Earth MLvl: +15</li>
						   <li>Healing MLvl: +15</li>
						   <li>Ice MLvl: +20</li>
						   <li>Damage Reflection: +25</li>
                           <li>protect all: +9%</li>
						   <li>Fast Regeneration</li>
                       </ul>
            </div>
        </div>

	        <div id="card31" class="floating-card">
            <div class="floating-card-content">
                <span class="close" onclick="closeCard('card31')">&times;</span>
				<h3>Ultimatum Druid Rod</h3>
                <img src="images/mortera/44837.gif" alt="Card image" class="floating-card-image">
                       <ul>
						   <li>Critical Chance: +10%</li>
                           <li>Critical Dmg: +45%</li>
                           <li>Life Leech: +10%</li>
                           <li>Mana Leech: +10%</li>
                           <li>Magic Lvl: +20</li>
                           <li>Earth MLvl: +20</li>
						   <li>Healing MLvl: +20</li>
						   <li>Ice MLvl: +20</li>
                           <li>protect all: +10%</li>
						   <li>Fast Regeneration</li>
                       </ul>
            </div>
        </div>

	        <div id="card32" class="floating-card">
            <div class="floating-card-content">
                <span class="close" onclick="closeCard('card32')">&times;</span>
				<h3>Ultimatum Druid Folio</h3>
                <img src="images/mortera/44835.gif" alt="Card image" class="floating-card-image">
                       <ul>
                           <li>Def: 100</li>
						   <li>Critical Dmg: +25%</li>
                           <li>Mana Leech: +10%</li>
                           <li>Magic Lvl: +20</li>
                           <li>Earth MLvl: +15</li>
						   <li>Healing MLvl: +15</li>
						   <li>Ice MLvl: +20</li>
						   <li>Damage Reflection: +25</li>
                           <li>protect all: +9%</li>
						   <li>Fast Regeneration</li>
                       </ul>
            </div>
        </div>
  </div>
</div>
        <div id="sorcerer" class="sub-section">
            <center><h3>Sorcerer Items</h3></center>
    <div class="container">
        <div class="card-row">
	        <div class="static-card" onclick="openCard('card33')">
                <center><img src="images/mortera/44799.gif" alt="Click to open card" class="static-card-image"></center>
                <div class="static-card-content">
                    <h3>Vip Sorcerer Amulet</h3>
                       <ul>
                           <li>Arm: 15</li>
                           <li>Critical Dmg: +10%</li>
                           <li>Life Leech: +5%</li>
                           <li>Mana Leech: +5%</li>
                           <li>Magic Lvl: +12</li>
                           <li>Energy MLvl: +5</li>
						   <li>Fire MLvl: +5</li>
                           <li>protect all: +6%</li>
						   <li>Fast Regeneration</li>
                       </ul>
					<p>Evoluciona con 15 vip sorcerer amulets en:</p>
                    <center><p>(clik a la imagen)</p></center>
                </div>
            </div>
	        <div class="static-card" onclick="openCard('card34')">
                <center><img src="images/mortera/44797.gif" alt="Click to open card" class="static-card-image"></center>
                <div class="static-card-content">
                    <h3>Vip Sorcerer Boots</h3>
                       <ul>
                           <li>Arm: 30</li>
                           <li>Critical Dmg: +5%</li>
                           <li>Life Leech: +5%</li>
                           <li>Mana Leech: +5%</li>
                           <li>Magic Lvl: +10</li>
                           <li>Death MLvl: +5</li>
                           <li>protect all: +6%</li>
						   <li>Speed: +100</li>
						   <li>Fast Regeneration</li>
                       </ul>
					<p>Evoluciona con 15 vip sorcerer boots en:</p>
                    <center><p>(clik a la imagen)</p></center>
                </div>
            </div>
	        <div class="static-card" onclick="openCard('card35')">
                <center><img src="images/mortera/44796.gif" alt="Click to open card" class="static-card-image"></center>
                <div class="static-card-content">
                    <h3>Vip Sorcerer Helmet</h3>
                       <ul>
                           <li>Arm: 30</li>
                           <li>Critical Dmg: +10%</li>
                           <li>Life Leech: +5%</li>
                           <li>Mana Leech: +5%</li>
                           <li>Magic Lvl: +12</li>
                           <li>Energy MLvl: +7</li>
						   <li>Fire MLvl: +7</li>
                           <li>protect all: +6%</li>
						   <li>Fast Regeneration</li>
                       </ul>
                    <p>Evoluciona con 15 vip sorcerer helmets en:</p>
                    <center><p>(clik a la imagen)</p></center>
                </div>
            </div>
	        <div class="static-card" onclick="openCard('card36')">
                <center><img src="images/mortera/44795.gif" alt="Click to open card" class="static-card-image"></center>
                <div class="static-card-content">
                    <h3>Vip sorcerer Legs</h3>
                       <ul>

                           <li>Arm: 30</li>
                           <li>Critical Dmg: +11%</li>
                           <li>Life Leech: +5%</li>
                           <li>Mana Leech: +5%</li>
                           <li>Magic Lvl: +12</li>
                           <li>Energy MLvl: +7</li>
						   <li>Fire MLvl: +7</li>
                           <li>protect all: +6%</li>
						   <li>Fast Regeneration</li>
                       </ul>
                    <p>Evoluciona con 15 vip sorcerer legs en:</p>
                    <center><p>(clik a la imagen)</p></center>
                </div>
            </div>
	        <div class="static-card" onclick="openCard('card37')">
                <center><img src="images/mortera/21217.gif" alt="Click to open card" class="static-card-image"></center>
                <div class="static-card-content">
                    <h3>Vip Sorcerer Light</h3>
                       <ul>
                           <li>Critical Dmg: +5%</li>
                           <li>Life Leech: +5%</li>
                           <li>Mana Leech: +5%</li>
                           <li>Magic Lvl: +10</li>
                           <li>Energy MLvl: +10</li>
						   <li>Fire MLvl: +10</li>
                           <li>Death MLvl: +10</li>
                           <li>protect all: +6%</li>
						   <li>Fast Regeneration</li>
                       </ul>
                    <p>Evoluciona con 15 vip sorcerer lights en:</p>
                    <center><p>(clik a la imagen)</p></center>
                </div>
            </div>
	        <div class="static-card" onclick="openCard('card38')">
                <center><img src="images/mortera/44800.gif" alt="Click to open card" class="static-card-image"></center>
                <div class="static-card-content">
                    <h3>Vip sorcerer Raiment</h3>
                       <ul>
						   <li>Arm: 35</li>
                           <li>Critical Dmg: +12%</li>
                           <li>Life Leech: +5%</li>
                           <li>Mana Leech: +5%</li>
                           <li>Magic Lvl: +20</li>
                           <li>Energy MLvl: +7</li>
						   <li>Fire MLvl: +7</li>
                           <li>protect all: +6%</li>
						   <li>Fast Regeneration</li>
                       </ul>
                    <p>Evoluciona con 15 vip sorcerer raiments en:</p>
                    <center><p>(clik a la imagen)</p></center>
                </div>
            </div>
			<div class="static-card" onclick="openCard('card39')">
                <center><img src="images/mortera/44801.gif" alt="Click to open card" class="static-card-image"></center>
                <div class="static-card-content">
                    <h3>Vip sorcerer Ring</h3>
                       <ul>
                           <li>Critical Dmg: +10%</li>
                           <li>Life Leech: +5%</li>
                           <li>Mana Leech: +5%</li>
                           <li>Magic Lvl: +10</li>
                           <li>Energy MLvl: +10</li>
						   <li>Fire MLvl: +10</li>
                           <li>protect all: +6%</li>
						   <li>Fast Regeneration</li>
						                              
                       </ul>
                    <p>Evoluciona con 15 vip sorcerer rings en:</p>
                    <center><p>(clik a la imagen)</p></center>
                </div>
            </div>
			<div class="static-card" onclick="openCard('card40')">
                <center><img src="images/mortera/44794.gif" alt="Click to open card" class="static-card-image"></center>
                <div class="static-card-content">
                    <h3>Vip Sorcerer Spellbook</h3>
                       <ul>

                           <li>Def: 50</li>
                           <li>Critical Dmg: +10%</li>
                           <li>Life Leech: +5%</li>
                           <li>Mana Leech: +5%</li>
                           <li>Magic Lvl: +10</li>
                           <li>Energy MLvl: +8</li>
						   <li>Fire MLvl: +8</li>
                           <li>protect all: +6%</li>
						   <li>Fast Regeneration</li>
                       </ul>
                    <p>Evoluciona con 15 vip sorcerer spellbooks en:</p>
                    <center><p>(clik a la imagen)</p></center>
                </div>
            </div>
			<div class="static-card" onclick="openCard('card41')">
                <center><img src="images/mortera/44798.gif" alt="Click to open card" class="static-card-image"></center>
                <div class="static-card-content">
                    <h3>Vip Sorcerer Wand</h3>
                       <ul>
						   <li>Critical Chance: +10%</li>
                           <li>Critical Dmg: +15%</li>
                           <li>Life Leech: +5%</li>
                           <li>Mana Leech: +5%</li>
                           <li>Magic Lvl: +10</li>
                           <li>protect all: +6%</li>
						   <li>Fast Regeneration</li>
                       </ul>
                    <p>Evoluciona con 15 vip sorcerer wands en:</p>
                    <center><p>(clik a la imagen)</p></center>
                </div>
            </div>
        </div>	
	        <div id="card33" class="floating-card">
            <div class="floating-card-content">
                <span class="close" onclick="closeCard('card33')">&times;</span>
				<h3>Ultimatum Sorcerer Amulet</h3>
                <img src="images/mortera/44811.gif" alt="Card image" class="floating-card-image">
                       <ul>
                           <li>Arm: 15</li>
						   <li>Critical Dmg: +20%</li>
                           <li>Life Leech: +10%</li>
                           <li>Mana Leech: +10%</li>
						   <li>Magic Lvl: +24</li>
                           <li>protect all: +9%</li>
						   <li>Fast Regeneration</li>
                       </ul>
            </div>
        </div>
        
	        <div id="card34" class="floating-card">
            <div class="floating-card-content">
                <span class="close" onclick="closeCard('card34')">&times;</span>
				<h3>Ultimatum Sorcerer Boots</h3>
                <img src="images/mortera/44808.gif" alt="Card image" class="floating-card-image">
                       <ul>
                           <li>Arm: 60</li>
						   <li>Critical Dmg: +15%</li>
                           <li>Life Leech: +10%</li>
                           <li>Mana Leech: +10%</li>
                           <li>Magic Lvl: +20</li>
                           <li>Death MLvl: +15</li>
						   <li>Damage Reflection: +25</li>
                           <li>protect all: +9%</li>
						   <li>Speed: +200</li>
						   <li>Fast Regeneration</li>
                       </ul>
            </div>
        </div>

	        <div id="card35" class="floating-card">
            <div class="floating-card-content">
                <span class="close" onclick="closeCard('card35')">&times;</span>
				<h3>Ultimatum Sorcerer Helmet</h3>
                <img src="images/mortera/44805.gif" alt="Card image" class="floating-card-image">
                       <ul>
                           <li>Arm: 60</li>
						   <li>Critical Dmg: +25%</li>
                           <li>Life Leech: +10%</li>
                           <li>Mana Leech: +10%</li>
                           <li>Magic Lvl: +24</li>
                           <li>Energy MLvl: +14</li>
						   <li>Fire MLvl: +14</li>
						   <li>Damage Reflection: +25</li>
                           <li>protect all: +9%</li>
						   <li>Fast Regeneration</li>
                       </ul>
            </div>
        </div>

	        <div id="card36" class="floating-card">
            <div class="floating-card-content">
                <span class="close" onclick="closeCard('card36')">&times;</span>
				<h3>Ultimatum Sorcerer Legs</h3>
                <img src="images/mortera/44807.gif" alt="Card image" class="floating-card-image">
                       <ul>
                           <li>Arm: 60</li>
						   <li>Critical Dmg: +25%</li>
                           <li>Life Leech: +10%</li>
                           <li>Mana Leech: +10%</li>
                           <li>Magic Lvl: +24</li>
                           <li>Energy MLvl: +14</li>
						   <li>Fire MLvl: +14</li>
						   <li>Damage Reflection: +25</li>
                           <li>protect all: +9%</li>
						   <li>Fast Regeneration</li>
                       </ul>
            </div>
        </div>

	        <div id="card37" class="floating-card">
            <div class="floating-card-content">
                <span class="close" onclick="closeCard('card37')">&times;</span>
				<h3>Psychosis</h3>
                <img src="images/mortera/44803.gif" alt="Card image" class="floating-card-image">
                       <ul>
						   <li>Critical Dmg: +10%</li>
                           <li>Life Leech: +10%</li>
                           <li>Mana Leech: +10%</li>
                           <li>Magic Lvl: +20</li>
                           <li>Energy MLvl: +20</li>
						   <li>Fire MLvl: +20</li>
						   <li>Death MLvl: +20</li>
                           <li>protect all: +9%</li>
						   <li>Fast Regeneration</li>
                       </ul>
            </div>
        </div>

	        <div id="card38" class="floating-card">
            <div class="floating-card-content">
                <span class="close" onclick="closeCard('card38')">&times;</span>
				<h3>Ultimatum sorcerer Frock</h3>
                <img src="images/mortera/44804.gif" alt="Card image" class="floating-card-image">
                       <ul>
                           <li>Arm: 70</li>
						   <li>Critical Dmg: +24%</li>
                           <li>Life Leech: +10%</li>
                           <li>Mana Leech: +10%</li>
                           <li>Magic Lvl: +40</li>
                           <li>Energy MLvl: +14</li>
						   <li>Fire MLvl: +14</li>
						   <li>Death MLvl: +20</li>
						   <li>Damage Reflection: +25</li>
                           <li>protect all: +9%</li>
						   <li>Fast Regeneration</li>
                       </ul>
            </div>
        </div>

	        <div id="card39" class="floating-card">
            <div class="floating-card-content">
                <span class="close" onclick="closeCard('card39')">&times;</span>
				<h3>Ultimatum Sorcerer Ring</h3>
                <img src="images/mortera/44809.gif" alt="Card image" class="floating-card-image">
                       <ul>
						   <li>Critical Dmg: +25%</li>
                           <li>Life Leech: +10%</li>
                           <li>Mana Leech: +10%</li>
                           <li>Magic Lvl: +20</li>
                           <li>Energy MLvl: +20</li>
						   <li>Fire MLvl: +20</li>
						   <li>Damage Reflection: +25</li>
                           <li>protect all: +9%</li>
						   <li>Fast Regeneration</li>
                       </ul>
            </div>
        </div>

	        <div id="card40" class="floating-card">
            <div class="floating-card-content">
                <span class="close" onclick="closeCard('card40')">&times;</span>
				<h3>Ultimatum Sorcerer Spellbook</h3>
                <img src="images/mortera/44802.gif" alt="Card image" class="floating-card-image">
                       <ul>
                           <li>Def: 100</li>
						   <li>Critical Dmg: +25%</li>
                           <li>Mana Leech: +10%</li>
                           <li>Magic Lvl: +20</li>
                           <li>Energy MLvl: +16</li>
						   <li>Fire MLvl: +16</li>
						   <li>Damage Reflection: +25</li>
                           <li>protect all: +9%</li>
						   <li>Fast Regeneration</li>
                       </ul>
            </div>
        </div>

	        <div id="card41" class="floating-card">
            <div class="floating-card-content">
                <span class="close" onclick="closeCard('card41')">&times;</span>
				<h3>Ultimatum Sorcerer Wand</h3>
                <img src="images/mortera/44806.gif" alt="Card image" class="floating-card-image">
                       <ul>
						   <li>Critical Chance: +10%</li>
                           <li>Critical Dmg: +45%</li>
                           <li>Life Leech: +10%</li>
                           <li>Mana Leech: +10%</li>
                           <li>Magic Lvl: +20</li>
                           <li>Energy MLvl: +20</li>
						   <li>Fire MLvl: +20</li>
						   <li>Death MLvl: +20</li>
                           <li>protect all: +10%</li>
						   <li>Fast Regeneration</li>
                       </ul>
        </div>
     </div>
  </div>
</div>
        <div id="others" class="sub-section">
            <center><h3>Otros Items</h3></center>
	<div class="container">
        <div class="card-row">
	        <div class="static-card" onclick="openCard('card42')">
                <center><img src="images/mortera/954.png" alt="Click to open card" class="static-card-image"></center>
                <div class="static-card-content">
                    <h3>100% Tier</h3>
                       <ul>
                           <li>Increase 1 tier to any item you want</li>
                           <li>Maximum of tier 20</li>

                </div>
            </div>
	        <div class="static-card" onclick="openCard('card43')">
                <center><img src="images/mortera/44760.gif" alt="Click to open card" class="static-card-image"></center>
                <div class="static-card-content">
                    <h3>Magical Backpack</h3>
                       <ul>
                           <li>Critical Dmg: +25%</li>
                           <li>Life Leech Chance: +100%</li>
						   <li>Life Leech: +10%</li>
						   <li>Mana Leech Chance: +100%</li>
                           <li>Every buff on: +10%</li>
                       </ul>
                </div>
            </div>
	        <div class="static-card" onclick="openCard('card44')">
                <center><img src="images/mortera/3199.png" alt="Click to open card" class="static-card-image"></center>
                <div class="static-card-content">
                    <h3>Life Drainer Rune</h3>
                    <ul>
						<li>3x3 damage physical only for knights</li>
					</ul>
                </div>
            </div>
	        <div class="static-card" onclick="openCard('card45')">
                <center><img src="images/mortera/3162.png" alt="Click to open card" class="static-card-image"></center>
                <div class="static-card-content">
                    <h3>Ultra Avalanche Rune</h3>
                    <ul>
						<li>3x3 damage ice for all vocations</li>
					</ul>
                </div>
            </div>
	        <div class="static-card" onclick="openCard('card46')">
                <center><img src="images/mortera/3154.png" alt="Click to open card" class="static-card-image"></center>
                <div class="static-card-content">
                    <h3>Ultra Deathstorm Rune</h3>
                    <ul>
						<li>3x3 damage death for all vocations</li>
					</ul>
				</div>
            </div>
	        <div class="static-card" onclick="openCard('card47')">
                <center><img src="images/mortera/3193.png" alt="Click to open card" class="static-card-image"></center>
                <div class="static-card-content">
                    <h3>Ultra Greatfireball Rune</h3>
                    <ul>
						<li>3x3 damage fire for all vocations</li>
					</ul>
                </div>
            </div>
			<div class="static-card" onclick="openCard('card48')">
                <center><img src="images/mortera/3186.png" alt="Click to open card" class="static-card-image"></center>
                <div class="static-card-content">
                    <h3>Ultra Holyrain Rune</h3>
                    <ul>
						<li>3x3 damage holy for all vocations</li>
					</ul>
                </div>
            </div>
			<div class="static-card" onclick="openCard('card49')">
                <center><img src="images/mortera/3169.png" alt="Click to open card" class="static-card-image"></center>
                <div class="static-card-content">
                    <h3>Ultra Stone Shower Rune</h3>
                    <ul>
						<li>3x3 damage earth for all vocations</li>
					</ul>
                </div>
            </div>
			<div class="static-card" onclick="openCard('card50')">
                <center><img src="images/mortera/3150.png" alt="Click to open card" class="static-card-image"></center>
                <div class="static-card-content">
                    <h3>Ultra Sudden Death Rune</h3>
					<ul>
						<li>Ultra sudden death for all vocations</li>
					</ul>
                </div>
            </div>
			<div class="static-card" onclick="openCard('card51')">
                <center><img src="images/mortera/3201.png" alt="Click to open card" class="static-card-image"></center>
                <div class="static-card-content">
                    <h3>Ultra Thunderstorm Rune</h3>
                    <ul>
						<li>3x3 damage energy for all vocations</li>
					</ul>
                </div>
            </div>
			<div class="static-card" onclick="openCard('card52')">
                <center><img src="images/mortera/31633.png" alt="Click to open card" class="static-card-image"></center>
                <div class="static-card-content">
                    <h3>Teleport Cube</h3>
                    <p><//p>
					<ul>
						<li>Teleport to locations</li>
					</ul>
                </div>
            </div>
        </div>
    </div>
</div>
    </section>
    <section id="quests">
        <h2>Quests</h2>
        <p>Aqui encontraras todas las quest disponibles en el servidor y su informacion.</p>
		<div class="cardmodal" onclick="openModal('modal1')">
        <h3>Annihilator</h3>
        <img src="images/quests/Green_Demon_Armor.gif" alt="Imagen 1">
        <img src="images/quests/Fog_Portal.gif" alt="Imagen 1">
    </div>

    <div class="cardmodal" onclick="openModal('modal2')">
        <h3>Supreme Cube</h3>
        <img src="images/quests/cube.gif" alt="Imagen 2">
        <img src="images/quests/Fog_Portal.gif" alt="Imagen 2">
    </div>
    <!-- Más cuadros aquí -->
    <div id="modal1" class="modal">
        <div class="modal-content">
            <span class="closemodall" onclick="closeModal('modal1')">&times;</span>
            <h2>Información Completa 1</h2>
            <p>Todo el contenido que quieras aquí para el cuadro 1...</p>
        </div>
    </div>

    <div id="modal2" class="modal">
        <div class="modal-content">
            <span class="closemodall" onclick="closeModal('modal2')">&times;</span>
            <h2>Información Completa 2</h2>
            <p>Todo el contenido que quieras aquí para el cuadro 2...</p>
        </div>
    </div>
    </section>
	<section id="comandos">
		<div class="TableContainer">
   <div class="CaptionContainer">
      <div class="CaptionInnerContainer">
         <span class="CaptionEdgeLeftTop" style="background-image:url(./templates/tibiacom/images/global/content/box-frame-edge.gif);"></span>
         <span class="CaptionEdgeRightTop" style="background-image:url(./templates/tibiacom/images/global/content/box-frame-edge.gif);"></span>
         <span class="CaptionBorderTop" style="background-image:url(./templates/tibiacom/images/global/content/table-headline-border.gif);"></span>
         <span class="CaptionVerticalLeft" style="background-image:url(./templates/tibiacom/images/global/content/box-frame-vertical.gif);"></span>
         <div class="Text">
            <font color="white">Comandos</font>
         </div>
         <span class="CaptionVerticalRight" style="background-image:url(./templates/tibiacom/images/global/content/box-frame-vertical.gif);"></span>
         <span class="CaptionBorderBottom" style="background-image:url(./templates/tibiacom/images/global/content/table-headline-border.gif);"></span>
         <span class="CaptionEdgeLeftBottom" style="background-image:url(./templates/tibiacom/images/global/content/box-frame-edge.gif);"></span>
         <span class="CaptionEdgeRightBottom" style="background-image:url(./templates/tibiacom/images/global/content/box-frame-edge.gif);"></span>
      </div>
   </div>
   <table class="Table3" cellpadding="0" cellspacing="0">
      <tbody>
         <tr>
            <td>
               <div class="InnerTableContainer">
                  <table style="width:100%;">
                     <tbody>
                        <tr>
                           <td>
                              <div class="TableContentContainer">
                                 <table border="0" cellpadding="4" cellspacing="1" width="100%">
                                    <tbody>
                                    <tr bgcolor="#F1E0C6">
                                       <td>
                                          <b>!serverinfo</b>
                                       </td>
                                       <td>Ver la informacion del Servidor.</td>
                                    </tr>
                                    <tr bgcolor="#D4C0A1">
                                       <td>
                                          <b>!reward</b>
                                       </td>
                                       <td>Obtienes una <i>Exercise Weapon</i> con 2000 cargas.</td>
                                    </tr>
                                    <tr bgcolor="#F1E0C6">
                                       <td>
                                          <b>!online</b>
                                       </td>
                                       <td>Muestra la cantidad de jugadores que hay en linea.</td>
                                    </tr>
                                    <tr bgcolor="#D4C0A1">
                                       <td>
                                          <b>!time</b>
                                       </td>
                                       <td>Muestra la <i>hora tibiana</i>.</td>
                                    </tr>
                                    <tr bgcolor="#F1E0C6">
                                       <td>
                                          <b>!vip</b>
                                       </td>
                                       <td>Muestra cuantos dias <i>vip</i> te quedan.</td>
                                    </tr>
                                    <tr bgcolor="#D4C0A1">
                                       <td>
                                          <b>!aol</b>
                                       </td>
                                       <td>Compras un <i>Amulet of Loss</i>.</td>
                                    </tr>
                                    <tr bgcolor="#F1E0C6">
                                       <td>
                                          <b>!autoloot</b>
										  <i>on/off</i>
                                       </td>
                                       <td>Recojer todo sin necesidad de hacer click en cuerpos.</td>
                                    </tr>
                                    <tr bgcolor="#D4C0A1">
                                       <td>
                                          <b>!balance</b>
                                          <b>!deposit</b>
                                          <b>!withdraw</b>
                                          <b>!transfer</b>
                                       </td>
                                       <td>Sistema de <i>banco</i> sin necesidad de estar con algun npc.</td>
                                    </tr>
                                    <tr bgcolor="#F1E0C6">
                                       <td>
                                          <b>!bless</b>
                                       </td>
                                       <td>Compras todas las <i>bless</i>.</td>
                                    </tr>
                                    <tr bgcolor="#D4C0A1">
                                       <td>
                                          <b>!buyhouse</b>
                                          <i>Lvl; 500</i>
                                       </td>
                                       <td>Rentas una casa.</td>
                                    </tr>
                                    <tr bgcolor="#F1E0C6">
                                       <td>
                                          <b>!leavehouse</b>
                                       </td>
                                       <td>Abandonas una <i>Casa</i> despues del server save.</td>
                                    </tr>
                                     <tr bgcolor="#D4C0A1">
                                       <td>
                                          <b>!sellhouse</b>
                                       </td>
                                       <td>Vendes tu <i>Casa</i> a un <i>Jugador</i>.</td>
                                    </tr>
                                    <tr bgcolor="#F1E0C6">
                                       <td>
                                          <b>!hiddenshop</b>
										  <i>on/off</i>
                                       </td>
                                       <td>Oculta <i>items</i> que no tengas para vender en los npc.</td>
                                    </tr>
									<tr bgcolor="#D4C0A1">
                                       <td>
                                          <b>!commands</b>
                                       </td>
                                       <td>Muestra todos los <i>Comandos</i> disponibles.</td>
                                    </tr>
									<tr bgcolor="#F1E0C6">
                                       <td>
                                          <b>!emote</b>
										  <i>on/off</i>
                                       </td>
                                       <td>Cambia tus <i>spells</i> por <i>emote spells</i>.</td>
                                    </tr>
									<tr bgcolor="#D4C0A1">
                                       <td>
                                          <b>!frags</b>
                                       </td>
                                       <td>Muestra tus <i>frags</i> totales.</td>
                                    </tr>
									<tr bgcolor="#F1E0C6">
                                       <td>
                                          <b>!promotion</b>
                                       </td>
                                       <td>haces a tu personaje <i>promotion</i> sin ir al king tibianus.</td>
                                    </tr>
									<tr bgcolor="#D4C0A1">
                                       <td>
                                          <b>!stamina</b>
										  <i>1/2520</i>
                                       </td>
                                       <td>compras minutos de <i>stamina</i> cada 1 minuto son 200k</td>
                                    </tr>
									<tr bgcolor="#F1E0C6">
                                       <td>
                                          <b>!addon</b>
                                          <b>!mount</b>
                                       </td>
                                       <td>Obtienes un <i>addon</i>  o un <i>mount</i><i>(ocupas doll)</i>.</td>
                                    </tr>
									<tr bgcolor="#D4C0A1">
                                       <td>
                                          <b>!aura</b>
										  <i>on/off</i>
                                       </td>
                                       <td>Te regenera <i>5%</i> de vida cada 2 segundos por <i>100000k</i>  cada 2 segundos</i>.</td>
                                    </tr>
									<tr bgcolor="#F1E0C6">
                                       <td>
                                          <b>!rod</b>
										  <i>ultimatum rod</i>
                                       </td>
                                       <td>Cambias entre 3 elementos disponibles para Druid <i>Ice</i>, <i>Earth</i>, <i>Death</i></i>.</td>
                                    </tr>
									<tr bgcolor="#D4C0A1">
                                       <td>
                                          <b>!wand</b>
										  <i>ultimatum wand</i>
                                       </td>
                                       <td>Cambias entre 3 elementos disponibles para Sorcerer <i>Fire</i>, <i>Energy</i>, <i>Death</i></i>.</td>
                                    </tr>
                                    <tr class="Odd">
                                    </tr></tbody>
                                 </table>
                              </div>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </td>
         </tr>
      </tbody>
   </table>
</div>
<br>
<div class="TableContainer">
   <div class="CaptionContainer">
      <div class="CaptionInnerContainer">
         <span class="CaptionEdgeLeftTop" style="background-image:url(./templates/tibiacom/images/global/content/box-frame-edge.gif);"></span>
         <span class="CaptionEdgeRightTop" style="background-image:url(./templates/tibiacom/images/global/content/box-frame-edge.gif);"></span>
         <span class="CaptionBorderTop" style="background-image:url(./templates/tibiacom/images/global/content/table-headline-border.gif);"></span>
         <span class="CaptionVerticalLeft" style="background-image:url(./templates/tibiacom/images/global/content/box-frame-vertical.gif);"></span>
         <div class="Text">
            <font color="white">Modal Shop</font>
         </div>
         <span class="CaptionVerticalRight" style="background-image:url(./templates/tibiacom/images/global/content/box-frame-vertical.gif);"></span>
         <span class="CaptionBorderBottom" style="background-image:url(./templates/tibiacom/images/global/content/table-headline-border.gif);"></span>
         <span class="CaptionEdgeLeftBottom" style="background-image:url(./templates/tibiacom/images/global/content/box-frame-edge.gif);"></span>
         <span class="CaptionEdgeRightBottom" style="background-image:url(./templates/tibiacom/images/global/content/box-frame-edge.gif);"></span>
      </div>
   </div>
   <table class="Table3" cellpadding="0" cellspacing="0">
      <tbody>
         <tr>
            <td>
               <div class="InnerTableContainer">
                  <table style="width:100%;">
                     <tbody>
                        <tr>
                           <td>
                              <div class="TableContentContainer">
                                 <table border="0" cellpadding="4" cellspacing="1" width="100%">
                                    <tbody>
                                    <tr bgcolor="#F1E0C6">
                                       <td>
                                          <b>!shop</b>
										  <i>list</i>
                                       </td>
                                       <td>Este es un comando para comprar cosas sin necesidad de ir a algun <i>npc</i>, solo tienes que escribir el comando y el item, ejemplo <i>"!shop addon doll"</i> o simplemente <i>"!shop list"</i>, para ver la lista en modal de igual manera aqui la lista de items que puedes adquirir.</td>
                                    </tr>
									<tr bgcolor="#D4C0A1">
									    <td>
										  <b>Items</b>
										</td>
										<ul>
										<td>
                                            <li>addon doll</li>
                                            <li>squeezing gear of girlpower</li>
                                            <li>whacking driller of fate</li>
                                            <li>sneaky stabber of eliteness</li>
                                            <li>frozen starlight</li>
                                            <li>blessed wooden stake</li>
                                            <li>ceremonial ankh</li>
                                            <li>rainbow torch</li>
                                            <li>giant emerald</li>
                                            <li>giant ruby</li>
                                            <li>blood herb</li>
                                            <li>25 years backpack</li>
                                            <li>buggy backpack</li>
                                            <li>cake backpack</li>
                                            <li>lilyped backpack</li>
                                            <li>minotaur backpack</li>
                                            <li>moon backpack</li>
                                            <li>mushroom backpack</li>
                                            <li>backpack of holding</li>
                                            <li>changing backpack</li>
                                            <li>anniversary backpack</li>
                                            <li>birthday backpack</li>
                                            <li>deepling backpack</li>
                                            <li>crystal backpack</li>
                                            <li>book backpack</li>
                                            <li>energetic backpack</li>
                                            <li>wolf backpack</li>
                                            <li>winged backpack</li>
                                            <li>festive backpack</li>
                                            <li>ghost backpack</li>
                                            <li>pillow backpack</li>
                                            <li>raccoon backpack</li>
                                            <li>backpack</li>
                                            <li>purple backpack</li>
                                            <li>red backpack</li>
                                            <li>yellow backpack</li>
                                            <li>santa backpack</li>
                                            <li>pirate backpack</li>
                                            <li>glooth backpack</li>
                                            <li>orange backpack</li>
                                            <li>pannier backpack</li>
                                            <li>golden backpack</li>
                                            <li>green backpack</li>
                                            <li>grey backpack</li>
                                            <li>heart backpack</li>
                                            <li>jewelled backpack</li>
                                            <li>crystal pedestal</li>
                                            <li>expedition backpack</li>
                                            <li>demon backpack</li>
                                            <li>dragon backpack</li>
                                            <li>crown backpack</li>
                                            <li>fur backpack</li>
                                            <li>camouflage backpack</li>
                                            <li>brocade backpack</li>
                                            <li>blue backpack</li>
                                            <li>beach backpack</li>
                                            <li>giant sapphire</li>
                                            <li>Spectral Bolt</li>
                                            <li>Diamond Arrow</li>
                                            <li>Assassin Star</li>
                                            <li>Health Potion</li>
                                            <li>Mana Potion</li>
                                            <li>Strong Mana Potion</li>
                                            <li>Strong Health Potion</li>
                                            <li>Great Health Potion</li>
                                            <li>Great Mana Potion</li>
                                            <li>Great Spirit Potion</li>
                                            <li>Ultimate Health Potion</li>
                                            <li>Ultimate Mana Potion</li>
                                            <li>Ultimate Spirit Potion</li>
                                            <li>Supreme Health Potion</li>
                                            <li>Sudden Death Rune</li>
                                            <li>Explosion Rune</li>
                                            <li>Fire Bomb Rune</li>
                                            <li>Wild Growth Rune</li>
                                            <li>Ultimate Healing Rune</li>
                                            <li>Paralyse Rune</li>
                                            <li>Magic Wall Rune</li>
                                            <li>Great Fireball Rune</li>
                                            <li>Avalanche Rune</li>
										</td>
										</ul>
									</tr>
                                    <tr class="Odd">
                                    </tr></tbody>
                                 </table>
                              </div>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </td>
         </tr>
      </tbody>
   </table>
</div>
    </section>
    <section id="acercade">
        <h2>Server Info</h2>
        <p>Toda la informacion relacionada al servidor sobre stages, spells, sistemas, eventos etc.</p>
		<div class="menu-wrapper"> <!-- Cambié el nombre de la clase -->
        <div class="menu-sidebar">
            <ul>
                <li onclick="showContent('combat')">Combat and Hunting</li>
                <li onclick="showContent('npc')">NPC Interaction</li>
                <li onclick="showContent('quest')">Quest Tracker</li>
                <li onclick="showContent('life')">Life and Death</li>
            </ul>
        </div>
        <div class="menu-content">
            <div id="combat" class="info-section">
                <h2>Combat and Hunting</h2>
                <p>Click on a monster in the game window or in the battle list to attack it. Use autotrack and attack spells to deal damage.</p>
            </div>
            <div id="npc" class="info-section" style="display:none;">
                <h2>NPC Interaction</h2>
                <p>Interact with NPCs to receive quests, buy or sell items, and gather information.</p>
            </div>
            <div id="quest" class="info-section" style="display:none;">
                <h2>Quest Tracker</h2>
                <p>Track your ongoing quests, view quest logs, and plan your adventures.</p>
            </div>
            <div id="life" class="info-section" style="display:none;">
                <h2>Life and Death</h2>
                <p>Manage your health and experience, avoid dangerous situations to prevent dying.</p>
            </div>
        </div>
    </div>
    </section>
    <section id="conócenos">
        <div class="SmallBox">
  <div class="MessageContainer">
    <div class="BoxFrameHorizontal"
         style="background-image:url(templates/tibiacom/images/global/content/box-frame-horizontal.gif);"></div>
    <div class="BoxFrameEdgeLeftTop"
         style="background-image:url(templates/tibiacom/images/global/content/box-frame-edge.gif);"></div>
    <div class="BoxFrameEdgeRightTop"
         style="background-image:url(templates/tibiacom/images/global/content/box-frame-edge.gif);"></div>
    <div class="Message">
      <div class="BoxFrameVerticalLeft"
           style="background-image:url(templates/tibiacom/images/global/content/box-frame-vertical.gif);"></div>
      <div class="BoxFrameVerticalRight"
           style="background-image:url(templates/tibiacom/images/global/content/box-frame-vertical.gif);"></div>
      <table style="width:100%;">
        <tbody>
        <tr>
		<center><h1>Mortera Owner</h1></center>
          <div class="image-container">
    <img src="images/reiven.png" alt="Descripción de la imagen" class="wrap-image" onclick="openImage(this)">
    <p><img src="templates/tibiacom/images/letters/H.gif" />ola, soy <b>Reiven</b>, el administrador de <b>Mortera</b>. Me gustaría presentarme y compartir un poco sobre mí, mi equipo. y el servidor.</p>
	<p>Nuestra presencia dentro del servidor es limitada para mantener un entorno más serio. Consideramos que la presencia excesiva de un administrador puede dar una impresión incorrecta, como que se favorece a ciertos jugadores o se reparten regalos a amigos, lo cual es totalmente falso. Para evitar este tipo de comentarios, preferimos que la participación del administrador en el juego sea mínima o nula. Claro, estamos siempre atentos a los reportes que recibimos a través de Discord, la página web o WhatsApp. Nos esforzamos por responder lo más rápido posible, resolver dudas y corregir cualquier problema o bug en el servidor.</p>
       </div>
        </tr>
        </tbody>
      </table>
    </div>
    <div class="BoxFrameHorizontal"
         style="background-image:url(templates/tibiacom/images/global/content/box-frame-horizontal.gif);"></div>
    <div class="BoxFrameEdgeRightBottom"
         style="background-image:url(templates/tibiacom/images/global/content/box-frame-edge.gif);"></div>
    <div class="BoxFrameEdgeLeftBottom"
         style="background-image:url(templates/tibiacom/images/global/content/box-frame-edge.gif);"></div>
  </div>
</div>
       <!-- Contenedor para la imagen en grande -->
       <div id="image-modal22" class="modal22" onclick="closeImage22()">
           <span class="close22">&times;</span>
           <img class="modal22-content" id="full-image">
       </div>
    </section>
	 <script src="tools/wikia.js"></script>
</body>
</html>

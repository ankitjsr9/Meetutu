var xx = document.getElementById("teacher");
var yy = document.getElementById("learner");
var zz = document.getElementById("btn");

var slideIndex = 0;

function s1(){
    xx.style.left = "50px";
    yy.style.left = "450px";
    zz.style.left = "0";
}


function s2(){
    xx.style.left = "-400px";
    yy.style.left = "50px";
    zz.style.left = "110px";
}



function checkPassword(form) { 
    password1 = form.password1.value; 
    password2 = form.password2.value; 
    if (password1 == '') 
        alert ("Please enter Password");  
    else if (password2 == '') 
        alert ("Please enter confirm password");     
    else if (password1 != password2) { 
        alert ("\nPassword did not match: Please try again...") 
        return false; 
    } 
    else { 
        return true; 
    } 
}




















function autocomplete(inp, arr) {

    var currentFocus;

    inp.addEventListener("input", function(e) {
        var a, b, i, val = this.value;
        closeAllLists();
        if (!val) { return false;}
        currentFocus = -1;
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items");

        this.parentNode.appendChild(a);

        for (i = 0; i < arr.length; i++) {

            if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {

                b = document.createElement("DIV");

                b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                b.innerHTML += arr[i].substr(val.length);

                b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";

                b.addEventListener("click", function(e) {

                    inp.value = this.getElementsByTagName("input")[0].value;

                    closeAllLists();
                });
                a.appendChild(b);
            }
        }
    });

    inp.addEventListener("keydown", function(e) {
        var x = document.getElementById(this.id + "autocomplete-list");
        if (x) x = x.getElementsByTagName("div");
        if (e.keyCode == 40) {

            currentFocus++;

            addActive(x);
        } else if (e.keyCode == 38) { 
            currentFocus--;

            addActive(x);
        } else if (e.keyCode == 13) {

            e.preventDefault();
            if (currentFocus > -1) {

                if (x) x[currentFocus].click();
            }
        }
    });
    function addActive(x) {

        if (!x) return false;

        removeActive(x);
        if (currentFocus >= x.length) currentFocus = 0;
        if (currentFocus < 0) currentFocus = (x.length - 1);

        x[currentFocus].classList.add("autocomplete-active");
    }
    function removeActive(x) {

        for (var i = 0; i < x.length; i++) {
            x[i].classList.remove("autocomplete-active");
        }
    }
    function closeAllLists(elmnt) {

        var x = document.getElementsByClassName("autocomplete-items");
        for (var i = 0; i < x.length; i++) {
            if (elmnt != x[i] && elmnt != inp) {
                x[i].parentNode.removeChild(x[i]);
            }
        }
    }

    document.addEventListener("click", function (e) {
        closeAllLists(e.target);
    });
}
var pro = ["A# .NET", "A-0 System", "A+", "A++", "ABAP", "ABC", "ABC ALGOL", "ACC", "Accent", "Ace DASL (Distributed Application Specification Language)", "Action!", "ActionScript", "Actor", "Ada", "Adenine", "Agda", "Agilent VEE", "Agora", "AIMMS", "Aldor", "Alef", "ALF", "ALGOL 58", "ALGOL 60", "ALGOL 68", "ALGOL W", "Alice", "Alma-0", "AmbientTalk", "Amiga E", "AMOS", "AMPL", "AngelScript", "Apex", "APL", "App Inventor for Android's visual block language", "AppleScript", "APT", "Arc", "ARexx", "Argus", "Assembly language", "AutoHotkey", "AutoLISP / Visual LISP", "Averest", "AWK", "Axum", "B", "Babbage", "Ballerina", "Bash", "BASIC", "Batch file (Windows/MS-DOS)", "bc", "BCPL", "BeanShell", "Beef", "Bertrand", "BETA", "BLISS", "Blockly", "BlooP", "Boo", "Boomerang", "Bosque", "Bourne shell (including bash and ksh)", "Css", "C", "C-- (C minus minus)", "C++ (C plus plus) – ISO/IEC 14882", "C*", "C# (C sharp) – ISO/IEC 23270", "C/AL", "Caché ObjectScript", "C Shell (csh)", "Caml", "Cayenne", "CDuce", "Cecil", "Cesil", "Céu", "Ceylon", "CFEngine", "Cg", "Ch", "Chapel", "Charm", "CHILL", "CHIP-8", "chomski", "ChucK", "Cilk", "Citrine", "CL (IBM)", "Claire", "Clarion", "Clean", "Clipper", "CLIPS", "CLIST", "Clojure", "CLU", "CMS-2", "COBOL – ISO/IEC 1989", "CobolScript – COBOL Scripting language", "Cobra", "CoffeeScript", "ColdFusion", "COMAL", "Combined Programming Language (CPL)", "COMIT", "Common Intermediate Language (CIL)", "Common Lisp (also known as CL)", "COMPASS", "Component Pascal", "Constraint Handling Rules (CHR)", "COMTRAN", "Cool", "Coq", "Coral 66", "CorVision", "COWSEL", "CPL", "Cryptol", "Crystal", "Csound", "Cuneiform", "Curl", "Curry", "Cybil", "Cyclone", "Cypher Query Language", "Cython", "CEEMAC", "CEEMAC", "D", "DAML", "DASL (Datapoint's Advanced Systems Language)", "Dart", "Darwin", "DataFlex", "Datalog", "DATATRIEVE", "dBase", "dc", "DCL", "DinkC", "DIBOL", "Dog", "Draco", "DRAKON", "Dylan", "DYNAMO", "DAX (Data Analysis Expressions)", "E", "Ease", "Easy PL/I", "EASYTRIEVE PLUS", "eC", "ECMAScript", "Edinburgh IMP", "EGL", "Eiffel", "ELAN", "Elixir", "Elm", "Emacs Lisp", "Emerald", "Epigram", "EPL (Easy Programming Language)", "EPL (Eltron Programming Language)", "Erlang", "es", "Escher", "ESPOL", "Esterel", "Etoys", "Euclid", "Euler", "Euphoria", "EusLisp Robot Programming Language", "CMS EXEC (EXEC)", "EXEC 2", "Executable UML", "Ezhil", "F", "F#", "F*", "Factor", "Fantom", "FAUST", "FFP", "fish", "Fjölnir", "FL", "Flavors", "Flex", "FlooP", "FLOW-MATIC", "FOCAL", "FOCUS", "FOIL", "FORMAC", "@Formula", "Forth", "Fortran – ISO/IEC 1539", "Fortress", "FP", "Franz Lisp", "Futhark", "F-Script", "Game Maker Language(Scripting language)", "GameMonkey Script", "GAMS", "GAP", "G-code", "GDScript", "Genie", "GDL", "GEORGE", "GIT", "GLSL", "GNU E", "GNU Guile", "Go", "Go!", "GOAL", "Gödel", "Golo", "GOM (Good Old Mad)", "Google Apps Script", "Gosu", "GOTRAN", "GPSS", "GraphTalk", "GRASS", "Grasshopper", "Groovy", "Html", "Hack", "HAGGIS", "HAL/S", "Halide (programming language)", "Hamilton C shell", "Harbour", "Hartmann pipelines", "Haskell", "Haxe", "Hermes", "High Level Assembly", "HLSL", "Hollywood", "HolyC", "Hop", "Hopscotch", "Hope", "Hugo", "Hume", "HyperTalk", "Io", "Icon", "IBM Basic assembly language", "IBM HAScript", "IBM Informix-4GL", "IBM RPG", "IDL", "Idris", "Inform", "J#", "J++", "JADE", "JAL", "Janus (concurrent constraint programming language)", "Janus (time-reversible computing programming language)", "JASS", "Java", "J", "JavaFX Script", "JavaScript(Scripting language)", "Jess (programming language)", "JCL", "JEAN", "Join Java", "JOSS", "Joule", "JOVIAL", "Joy", "JScript", "JScript .NET", "Julia", "Jython", "K", "Kaleidoscope", "Karel", "KEE", "Kixtart", "Klerer-May System", "KIF", "Kojo", "Kotlin", "KRC", "KRL", "KRL (KUKA Robot Language)", "KRYPTON", "Korn shell (ksh)", "Kodu", "Kv", "LabVIEW", "Ladder", "LANSA", "Lasso", "Lava", "LC-3", "Legoscript", "LIL", "LilyPond", "Limbo", "Limnor", "LINC", "Lingo", "LINQ", "LIS", "LISA", "Language H", "Lisp – ISO/IEC 13816", "Lite-C", "Lithe", "Little b", "LLL", "Logo", "Logtalk", "LotusScript", "LPC", "LSE", "LSL", "LiveCode", "LiveScript", "Lua", "Lucid", "Lustre", "LYaPAS", "Lynx", "M2001", "M4", "M#", "Machine code", "MAD (Michigan Algorithm Decoder)", "MAD/I", "Magik", "Magma", "Maude system", "Máni", "Maple", "MAPPER (now part of BIS)", "MARK-IV (now VISION:BUILDER)", "Mary", "MASM Microsoft Assembly x86", "MATH-MATIC", "Maxima (see also Macsyma)", "Max (Max Msp – Graphical Programming Environment)", "MaxScript internal language 3D Studio Max", "Maya (MEL)", "MDL", "Mercury", "Mesa", "Metafont", "MHEG-5 (Interactive TV programming language)", "Microcode", "MicroScript", "MIIS", "Milk (programming language)", "MIMIC", "Mirah", "Miranda", "MIVA Script", "MIVA Script", "ML", "Model 204", "Modelica", "Modula", "Modula-2", "Modula-3", "Mohol", "MOO", "Mortran", "Mouse", "MPD", "Mathcad", "MSL", "MUMPS", "MuPAD", "Mutan", "Mystic Programming Language (MPL)", "NASM", "Napier88", "Neko", "Nemerle", "NESL", "Net.Data", "NetLogo", "NetRexx", "NewLISP", "NEWP", "Newspeak", "NewtonScript", "Nial", "Nice", "Nickle (NITIN)", "Nim", "NPL", "Not eXactly C (NXC)", "Not Quite C (NQC)", "NSIS", "Nu", "NWScript", "NXT-G", "o:XML", "Oak", "Oberon", "OBJ2", "Object Lisp", "ObjectLOGO", "Object REXX", "Object Pascal", "Objective-C", "Objective-J", "Obliq", "OCaml", "occam", "occam-π", "Octave", "OmniMark", "Opa", "Opal", "OpenCL", "OpenEdge ABL", "OPL", "OpenVera", "OPS5", "OptimJ", "Orc", "ORCA/Modula-2", "Oriel", "Orwell", "Oxygene", "Oz", "P", "P", "P4", "P′′", "ParaSail (programming language)", "PARI/GP", "Pascal – ISO 7185", "Pascal Script", "PCASTL", "PCF", "PEARL", "PeopleCode", "Perl", "PDL", "Pharo", "PHP", "Pico", "Picolisp", "Pict", "Pig (programming tool)", "Pike", "PILOT", "Pipelines", "Pizza", "PL-11", "PL/0", "PL/B", "PL/C", "PL/I – ISO 6160", "PL/M", "PL/P", "PL/SQL", "PL360", "PLANC", "Plankalkül", "Planner", "PLEX", "PLEXIL", "Plus", "POP-11", "POP-2", "PostScript", "PortablE", "POV-Ray SDL", "Powerhouse", "PowerBuilder – 4GL GUI application generator from Sybase", "PowerShell", "PPL", "Processing", "Processing.js", "Prograph", "PROIV", "Prolog", "PROMAL", "Promela", "PROSE modeling language", "PROTEL", "ProvideX", "Pro*C", "Pure", "Pure Data", "PureScript", "Python", "Q (programming language from Kx Systems)", "Q# (Microsoft programming language)", "Qalb", "Quantum Computation Language", "QtScript", "QuakeC", "QPL", "Qbasic", ".QL", "R", "R", "R++", "Racket", "Raku", "RAPID", "Rapira", "Ratfiv", "Ratfor", "rc", "Reason", "REBOL", "Red", "Redcode", "REFAL", "REXX", "Rittle", "Rlab", "ROOP", "RPG", "RPL", "RSL", "RTL/2", "Ruby", "Rust", "S", "S", "S2", "S3", "S-Lang", "S-PLUS", "SA-C", "SabreTalk", "SAIL", "SAM76", "SAS", "SASL", "Sather", "Sawzall", "Scala", "Scheme", "Scilab", "Scratch", "Script.NET", "Sed", "Seed7", "Self", "SenseTalk", "SequenceL", "Serpent", "SETL", "SIMPOL", "SIGNAL", "SiMPLE", "SIMSCRIPT", "Simula", "Simulink", "Singularity", "SISAL", "SLIP", "SMALL", "Smalltalk", "SML", "Strongtalk", "Snap!", "SNOBOL (SPITBOL)", "Snowball", "SOL", "Solidity", "SOPHAEROS", "Source", "SPARK", "Speakeasy", "Speedcode", "SPIN", "SP/k", "SPS", "SQL", "SQR", "Squeak", "Squirrel", "SR", "S/SL", "Starlogo", "Strand", "Stata", "Stateflow", "Subtext", "SBL", "SuperCollider", "SuperTalk", "Swift (Apple programming language)", "Swift (parallel scripting language)", "SYMPL", "SystemVerilog", "T", "T", "TACL", "TACPOL", "TADS", "TAL", "Tcl", "Tea", "TECO", "TELCOMP", "TeX", "TEX", "TIE", "TMG, compiler-compiler", "Tom", "TOM", "Toi", "Topspeed", "TPU", "Trac", "TTM", "T-SQL", "Transcript", "TTCN", "Turing", "TUTOR", "TXL", "TypeScript", "Tynker", "Ubercode", "UCSD Pascal", "Umple", "Unicon", "Uniface", "UNITY", "Unix shell", "UnrealScript", "Vala", "Verilog", "VHDL", "Vim script", "Viper", "Visual Basic", "Visual Basic .NET", "Visual DataFlex", "Visual DialogScript", "Visual Fortran", "Visual FoxPro", "Visual J++", "Visual LISP", "Visual Objects", "Visual Prolog", "VSXu", "WATFIV, WATFOR", "WebAssembly", "WebDNA", "Whiley", "Winbatch", "Wolfram Language", "Wyvern", "X++", "X10", "xBase", "xBase++", "XBL", "XC (targets XMOS architecture)", "xHarbour", "XL", "Xojo", "XOTcl", "XOD (programming language)", "XPL", "XPL0", "XQuery", "XSB", "XSharp", "XSLT", "Xtend", "Yorick", "YQL", "Yoix", "YUI", "Z notation", "Zebra, ZPL, ZPL2", "Zeno", "ZetaLisp", "ZOPL", "Zsh", "ZPL", "Z++"];
autocomplete(document.getElementById("myInput"), pro);          
autocomplete(document.getElementById("myInputq"), pro); 
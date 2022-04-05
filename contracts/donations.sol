pragma solidity ^0.4.25;

contract Donations {
    
    // Classe de Doação
    struct Donation {
        address donor; // Carteira do Doador
        address student; // Carteira do Estudante
        uint quantity; // Valor da Doação
    }
    
    // Classe de Doador
    struct Donor {
        address donor; // Carteira do Doador
        uint donatedNumber; // Número de Doações já feitas
        uint donatedQuantity; // Valor total já doado
        Donation[] donations; // Lista de Doações feitas por este Doador
    }
    
    // Classe de Estudante em situação de vulnerabilidade socioeconômica
    struct Student {
        address student; // Carteira do Estudante
        uint goal; // Meta da quantia a ser arrecadada
        uint collected; // Valor já arrecadado
        Donation[] donations; // Lista de Doações recebidas por este Estudante
    }
    
    Donor[] donors; // Lista de Doadores
    Student[] students; // Lista de Estudantes
    
    // Cadastrar Doador
    function registerDonor() public returns(bool registered) {
        registered = false;
        
        // Verificar se o Doador está cadastrado na lista de Estudantes
        bool verifyStudent = false;
        for (uint i = 0; i < students.length; i++) {
            if (students[i].student == msg.sender) {
                verifyStudent = true;
            }
        }
        
        // Verificar se o Doador já está cadastrado na lista de Doadores
        bool verifyDonor = false;
        for (i = 0; i < donors.length; i++) {
            if (donors[i].donor == msg.sender) {
                verifyDonor = true;
            }
        }
        
        // Em caso favorável, o Doador é cadastrado
        if (verifyStudent == false && verifyDonor == false) {
            donors.length += 1;
            Donor storage donor = donors[donors.length - 1];
            donor.donor = msg.sender;
            registered = true;
        }
    }
    
    // Fazer Doação
    function makeDonation(address student, uint quantity) public returns(bool donated) {
        donated = false;
        
        // Verificar se o Estudante está cadastrado na lista de Estudantes
        bool verifyStudent = false;
        for (uint s = 0; s < students.length; s++) {
            if (students[s].student == student) {
                verifyStudent = true;
                break;
            }
        }
        
        // Verificar se o Doador é um Estudante
        bool verifyDonor = true;
        for (uint i = 0; i < students.length; i++) {
            if (students[i].student == msg.sender) {
                verifyDonor = false;
                break;
            }
        }
        
        // Em casa favorável, inicia-se o processo de Doação
        if (verifyDonor == true && verifyStudent == true) {
            // Verifica se a meta do Estudante já foi atingida
            if (students[s].goal == students[s].collected) {
                donated = false;
            }
            
            // Caso contrário, o processo continua
            else {
                // Caso o valor doado seja superior ao necessário para bater a meta, doa-se somente o suficiente
                if (quantity > (students[s].goal - students[s].collected)) {
                    quantity = students[s].goal - students[s].collected;
                }
                
                // Busca-se o Doador na lista de Doadores
                bool haveDonor = false;
                for (uint d = 0; d < donors.length; d++) {
                    if (donors[d].donor == msg.sender) {
                        haveDonor = true;
                        break;
                    }
                }
                
                // Caso o Doador não exista, ele é cadastrado
                if (haveDonor == false) {
                    if (registerDonor() == true) {
                        for (d = 0; d < donors.length; d++) {
                            if (donors[d].donor == msg.sender) {
                                haveDonor = true;
                                break;
                            }
                        }
                    }
                }
                
                // A Doação é realizada
                donors[d].donatedNumber ++;
                donors[d].donatedQuantity += quantity;
                donors[d].donations.push(Donation({donor: msg.sender, student: student, quantity: quantity}));
                students[s].collected += quantity;
                students[s].donations.push(Donation({donor: msg.sender, student: student, quantity: quantity}));
                donated = true;
            }
        }
    }
}
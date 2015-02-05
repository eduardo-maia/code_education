#Passo a passo

Acessado https://github.com/

Clicado no link "Create a repository", e marcada a opção "Initialize this repository with a README"

Entrado no meu diretório local C:\Backup\Trabalho\github via Windows Explorer.

Right click para abrir o menu de contexto do Windows Explorer, fui na opção "Git bash".

Voltei para o navegador web, entrei no repositório criado https://github.com/eduardo-maia/code_education

Na caixa "HTTPS clone URL", cliquei para copiar para o clipboard o url para clonar o diretório.

Com o url no clipboard, voltei para o git bash, e digitei:

git clone https://github.com/eduardo-maia/code_education.git

cd code_education

Abri o arquivo README.md, e coloquei este texto que está sendo lido no momento.

Em seguida:

git add README.md

git commit -m "Alterado README.md"

git push origin master

Processo finalizado.

#Em boa hora

Além dos processos descritos para realizar o primeiro commit, faz-se necessário:

1. Baixar e instalar o git

2. Rodar ssh-keygen para gerar chaves pública e privada, upload da chave pública para o github.com. Isso faz-se necessário para não precisar ficar digitando usuário e senha a toda hora.

3. Configurar nome do usuário e email, respectivamente:

>*git config --global user.name "Eduardo Maia"*

>*git config --global user.email "maia@eduardomaia.com"*
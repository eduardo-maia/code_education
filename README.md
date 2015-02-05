#Passo a passo

Acessado https://github.com/

Clicado no link "Create a repository", e marcada a op��o "Initialize this repository with a README"

Entrado no meu diret�rio local C:\Backup\Trabalho\github via Windows Explorer.

Right click para abrir o menu de contexto do Windows Explorer, fui na op��o "Git bash".

Voltei para o navegador web, entrei no reposit�rio criado https://github.com/eduardo-maia/code_education

Na caixa "HTTPS clone URL", cliquei para copiar para o clipboard o url para clonar o diret�rio.

Com o url no clipboard, voltei para o git bash, e digitei:

git clone https://github.com/eduardo-maia/code_education.git

cd code_education

Abri o arquivo README.md, e coloquei este texto que est� sendo lido no momento.

Em seguida:

git add README.md

git commit -m "Alterado README.md"

git push origin master

Processo finalizado.

#Em boa hora

Al�m dos processos descritos para realizar o primeiro commit, faz-se necess�rio:

1. Baixar e instalar o git

2. Rodar ssh-keygen para gerar chaves p�blica e privada, upload da chave p�blica para o github.com. Isso faz-se necess�rio para n�o precisar ficar digitando usu�rio e senha a toda hora.

3. Configurar nome do usu�rio e email, respectivamente:

>*git config --global user.name "Eduardo Maia"*

>*git config --global user.email "maia@eduardomaia.com"*
@echo off
setlocal
pushd "%~dp0"

set "CODEX_RUNTIME=%USERPROFILE%\.cache\codex-runtimes\codex-primary-runtime\dependencies"
set "PATH=%CODEX_RUNTIME%\node\bin;%PATH%"
set "PNPM=%CODEX_RUNTIME%\bin\fallback\pnpm.cmd"

if not exist "%PNPM%" (
  echo No se encontro pnpm en el runtime de Codex.
  echo Instala Node.js desde https://nodejs.org/ o ejecuta esto desde Codex.
  pause
  exit /b 1
)

call "%PNPM%" run dev
popd

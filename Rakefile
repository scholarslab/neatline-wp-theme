require 'yaml'

task :default => :server


desc "Deploy it"
task :deploy => :build do
  sh 'rsync -rtzh --progress _site/ clioweb.org:/home/clioweb/clioweb.org/'
end

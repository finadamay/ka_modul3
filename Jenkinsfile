pipeline {
    agent any

    environment {
        DOCKER_IMAGE = "lailasyafinad/mouse:${BUILD_NUMBER}"
    }

    stages {
        stage('Clone Repository') {
            steps {
                checkout scm
            }
        }

        stage('Build Docker Image') {
            steps {
                script {
                    bat "docker build -t ${DOCKER_IMAGE} ."
                }
            }
        }

        stage('Push Docker Image') {
            steps {
                withCredentials([usernamePassword(credentialsId: 'dockerhub-jenkins',
                 usernameVariable: 'DOCKER_USERNAME', passwordVariable: 'DOCKER_PASSWORD')]) {
                    bat """
                    echo %DOCKER_PASSWORD% > docker-password.txt
                    docker login -u %DOCKER_USERNAME% --password-stdin < docker-password.txt
                    docker push ${DOCKER_IMAGE}
                    del docker-password.txt
                    """
                }
            }
        }
    }
}

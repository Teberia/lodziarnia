terraform {
  required_providers {
    aws = {
      source  = "hashicorp/aws"
      version = "~> 5.0"
    }
  }
  required_version = ">= 1.5.0"
}

provider "aws" {
    region = "eu-north-1"
}


resource "aws_instance" "app_server" {
  ami           = "ami-09a9858973b288bdd"
  instance_type = "t3.micro"
  key_name = "lodziarnia-key"
  vpc_security_group_ids = [aws_security_group.app_sg.id]
  associate_public_ip_address = true
  tags = {
    Name = "LodziarniaAppServer"
  }
}

resource "aws_security_group" "app_sg" {
      name        = "lodziarnia-app-sg"
  description = "Security group for PHP application"
  ingress {
    description = "HTTP"
    from_port   = 80
    to_port     = 80
    protocol    = "tcp"
    cidr_blocks = ["0.0.0.0/0"]
  }
  ingress {
    description = "SSH"
    from_port   = 22
    to_port     = 22
    protocol    = "tcp"
    cidr_blocks = ["0.0.0.0/0"]
  }
  egress {
    description = "Allow all outbound traffic"
    from_port   = 0
    to_port     = 0
    protocol    = "-1"
    cidr_blocks = ["0.0.0.0/0"]
  }

}

output "public_ip" {
  description = "Public IP of EC2 instance"
  value       = aws_instance.app_server.public_ip
}

output "public_dns" {
  description = "Public DNS of EC2 instance"
  value       = aws_instance.app_server.public_dns
}